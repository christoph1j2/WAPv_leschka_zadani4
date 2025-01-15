<?php

namespace App\Models\User;

use App\Models\BaseModel;
use Tracy\Debugger;

class UserModel extends BaseModel
{
    function getTableName()
    {
        return "users";
    }

    // * Registrace noveho uzivatele
    public function register(array $data): void
    {
        // Validace, zda adresa existuje v DB seznam_obci na zaklade obce a PSC
        // Vstupy vycisteny proti SQL operacim
        $this->validateAddress(
            $this->sanitizeSQL($data['postal_code']),
            $this->sanitizeSQL($data['city']),
            $this->sanitizeSQL($data['correspondence_postal_code']),
            $this->sanitizeSQL($data['correspondence_city']),
        );

        // Hash hesla a nasledny unset hesla (form)
        $data['password'] = $this->passwords->hash($data['password']);
        unset(/*$data['password'],*/ $data['password_confirm']);

        // Ulozeni do db
        $this->insert($data);
    }

    // * Unikatnost username
    public function usernameUniqueness(string $username): bool
    {
        // Zabezpeceno proti SQL operacim
        return $this->explorer->table('users')
                ->where('username = ?', $username)
                ->count() > 0;
        //Debugger::barDump($exists, 'Username exists count');
    }

    // * Unikatnost emailu
    public function emailUniqueness(string $email): bool
    {
        // Zabezpeceno proti SQL operacim
        return $this->explorer->table('users')
                ->where('email = ?', $email)
                ->count() > 0;
    }

    private function validateAddress(string $postcode, string $city, string $correspondence_postcode, string $correspondence_city): void
    {
        // Kvuli duplicitnim znakum pri dotazu db vyuziti trim()
        $postcode = trim($postcode, "'");
        $city = trim($city, "'");
        $correspondence_postcode = trim($correspondence_postcode, "'");
        $correspondence_city = trim($correspondence_city, "'");

        // Existuje zadana PSC a Obec?
        // Zabezpeceno proti SQL operacim
        $address = $this->explorer->table('obec')
            ->where('PSC = ?', (string) $postcode)
            ->where('ObecID = ? OR CastObceID = ?', $city, $city)
            ->fetch();

        // Neexistuje-li -> chyba
        if(!$address) {
            throw new \Exception('Adresa neexistuje (neplatná obec nebo část obce).');
        }

        // Existuje zadana PSC a Obec?
        // Zabezpeceno proti SQL operacim
        $correspondenceAddress = $this->explorer->table('obec')
            ->where('PSC = ?', (string) $correspondence_postcode)
            ->where('ObecID = ? OR CastObceID = ?', $correspondence_city, $correspondence_city)
            ->fetch();

        // Neexistuje-li -> chyba
        if (!$correspondenceAddress) {
            throw new \Exception('Korespondenční adresa neexistuje (neplatná obec nebo část obce).');
        }
    }

    private function sanitizeSQL(string $input): string
    {
        //odstraneni potencialne nebezpecnych znaku
        $input = trim($input);
        $input = strip_tags($input);

        return $this->explorer->getConnection()->quote($input);
    }
}