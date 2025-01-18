<?php

namespace App\Forms\Register;

use App\Forms\BaseForm;
use App\Models\Kraj\KrajModel;
use App\Models\Obec\ObecModel;
use App\Models\Preklad\PrekladModel;
use App\Models\User\UserModel;
use Contributte\FormsBootstrap\BootstrapForm;
use Latte\Runtime\Template;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Mail\Message;
use Nette\Security\Passwords;
use Nette\Utils\ArrayHash;
use Tracy\Debugger;
use Nette\Mail\SmtpMailer;
use Nette\Application\UI\ITemplate;

class RegisterForm extends BaseForm
{
    /** @var UserModel */
    public $userModel;

    /** @var KrajModel */
    protected $krajModel;

    /** @var ObecModel */
    protected $obecModel;

    /** @var PrekladModel */
    protected $prekladModel;

    public function __construct(UserModel $userModel, KrajModel $krajModel, ObecModel $obecModel, PrekladModel $prekladModel)
    {
        $this->setTranslator($prekladModel);


        $this->userModel = $userModel;
        $this->krajModel = $krajModel;
        $this->obecModel = $obecModel;
        $this->prekladModel = $prekladModel;

        parent::__construct(null);


        //$this->initializeForm();
    }

    protected function postProcessing()
    {
        $this["send"]->setCaption("Registrovat");
    }

    protected function pridatPolozky()
    {
        $this->addText('username', 'Uživatelské jméno:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MinLength, 'Uživatelské jméno musí mít alespoň %d znaky', 3)
            ->addRule($this::Pattern, 'Uživatelské jméno může mít pouze písmena, čísla a podtržítko', '^[a-zA-Z0-9_]+$')
            ->addRule($this::MaxLength, 'Uživatelské jméno může mít alespoň %d znaků', 50)
        ;

        $this->addText('name', 'Křestní jméno:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::Pattern, 'Jméno může obsahovat pouze písmena', '^[\p{L}]+$')
            ->addRule($this::MaxLength, 'Jméno může mít alespoň %d znaků', 50)
        ;

        $this->addText('surname', 'Příjmení:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::Pattern, 'Příjmení může obsahovat pouze písmena', '^[\p{L}]+$')
            ->addRule($this::MaxLength, 'Příjmení může mít alespoň %d znaků', 50)
        ;

        $this->addPassword('password', 'Heslo:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MinLength, 'Heslo musí mít alespoň %d znaků', 8)
        ;

        $this->addPassword('password_confirm', 'Potvrdit heslo:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MinLength, 'Heslo musí mít alespoň %d znaků', 8)
            ->addRule($this::Equal, 'Hesla se neshodují', $this['password'])
        ;

        $this->addEmail('email', 'Email:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::Email, 'Email je neplatný')
            ->addRule($this::MaxLength, 'Email může mít max %d znaků', 150)
        ;

        //!
        $kraj = $this->addSelect('kraj', $this->prekladModel->translate('Kraj:'), $this->krajModel->seznamKrajuProSelect())
            ->setPrompt('-- Zvolte kraj --')
            ->checkDefaultValue(false)
            ->setRequired(self::EMPTY_FIELD)
            ;

        $okres = $this->addSelect('okres', $this->prekladModel->translate('Okres:'))
            ->setPrompt('-- Zvolte okres --')
            ->setHtmlAttribute('data-depends', $kraj->getHtmlName())
            ->checkDefaultValue(false)
            //->setRequired(self::EMPTY_FIELD)
            ;
        //$this->addHidden('hidden-okres')->setHtmlAttribute('data-hidden', 'hidden-okres');
        //!
        // DEPRECATED
        /*
        $this->addText('city', 'Obec/Část obce:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MaxLength, 'Obec může mít max %d znaků', 100)
        ;
        */
        $this->addSelect('city', $this->prekladModel->translate('Obec:'))
            ->setPrompt('-- Zvolte obec --')
            ->setHtmlAttribute('data-depends', $okres->getHtmlName())
            ->checkDefaultValue(false)
            //->setRequired(self::EMPTY_FIELD)
            ;
        //$this->addHidden('hidden-city')->setHtmlAttribute('data-hidden', 'hidden-city');

        $this->addText('street', 'Ulice:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MaxLength, 'Ulice může mít max %d znaků', 150)
        ;

        $this->addText('postal_code', 'PSČ:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::Integer, 'PSČ Neplatné')
            ->addRule($this::Pattern, 'PSČ musí být ve formátu 54321', '\d{5}')
            ->addRule($this::MaxLength, 'PSČ může mít max %d znaků', 5)
        ;

        //#######

        //!
        $correspondence_kraj = $this->addSelect('correspondence_kraj', $this->prekladModel->translate('Kraj:'), $this->krajModel->seznamKrajuProSelect())
            ->setPrompt('-- Zvolte kraj --')
            ->setRequired(self::EMPTY_FIELD)
        ;

        $correspondence_okres = $this->addSelect('correspondence_okres', $this->prekladModel->translate('Okres:'))
            ->setPrompt('-- Zvolte okres --')
            ->setHtmlAttribute('data-depends', $correspondence_kraj->getHtmlName())
            //->setRequired(self::EMPTY_FIELD)
        ;
        //$this->addHidden('hidden-correspondence-okres')->setHtmlAttribute('data-hidden', 'hidden-correspondence-okres');
        //!
        // DEPRECATED
        /*
        $this->addText('correspondence_city', 'Obec/Část obce:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MaxLength, 'Obec může mít max %d znaků', 100)
        ;
        */
        $this->addSelect('correspondence_city', $this->prekladModel->translate('Obec:'))
            ->setPrompt('-- Zvolte obec --')
            ->setHtmlAttribute('data-depends', $correspondence_okres->getHtmlName())
            //->setRequired(self::EMPTY_FIELD)
        ;
        //$this->addHidden('hidden-correspondence-city')->setHtmlAttribute('data-hidden', 'hidden-correspondence-city');

        $this->addText('correspondence_street', 'Ulice:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::MaxLength, 'Ulice může mít max %d znaků', 150)
        ;

        $this->addText('correspondence_postal_code', 'PSČ:')
            ->setRequired(self::EMPTY_FIELD)
            ->addRule($this::Integer, 'PSČ Neplatné')
            ->addRule($this::Pattern, 'PSČ musí být ve formátu 54321', '\d{5}')
            ->addRule($this::MaxLength, 'PSČ může mít max %d znaků', 5)
        ;
    }

    protected function formSucceeded(BootstrapForm $form, ArrayHash $data)
    {
//        $data['okres'] = $data['okres'] ? $data['okres'] : $form['okres']->getRawValue();
//        $data['city'] = $data['city'] ? $data['city'] : $form['city']->getRawValue();
//        $data['correspondence_okres'] = $data['correspondence_okres'] ? $data['correspondence_okres'] : $form['correspondence_okres']->getRawValue();
//        $data['correspondence_city'] = $data['correspondence_city'] ? $data['correspondence_city'] : $form['correspondence_city']->getRawValue();

        //vlozeni zaznamu do db
        try
        {
            // vycisti data
            $sanitizedData = $this->sanitizeData($data);

            // vytvori uzivatele pomoci vycistenych dat
            $this->userModel->register((array) $sanitizedData);

            // posle email
            $this->sendConfirmEmail($sanitizedData);

            $this->getPresenter()->flashMessage('Registrace proběhla úspěšně.', "success");

            $params = $this->getPresenter()->getParameters();
            //odstraneni nepotrebneho parametru
            unset($params['register-locale']);

            $this->getPresenter()->redirect("this", $params);
        }
        catch (UniqueConstraintViolationException $e)
        {
            // hodi error pokud user existuje
            $this->getPresenter()->flashMessage("Uživatel s tímto jménem již existuje!", "error");
            $this["user"]->addError(self::USER_EXISTS);
            return;
        }
        catch (\Nette\Application\AbortException $e)
        {
            // !nedelat nic, je to guta
        }
        catch (\Exception $e)
        {
            $this->getPresenter()->flashMessage('Registrace se nezdařila: ' . $e->getMessage(), 'error');
            return;
        }
    }

    protected function validateForm(BootstrapForm $form, ArrayHash $data): void
    {
        // Je uzivatelske jmeno unikatni?
        if ($this->userModel->usernameUniqueness($data->username)){
            $form['username']->addError('Uživatelské jméno již existuje.');
            $this->getPresenter()->flashMessage('Uživatelské jméno již existuje.', 'error');
        }

        // Je email unikatni?
        if ($this->userModel->emailUniqueness($data->email)){
            $form['email']->addError('Uživatel s tímto emailem již existuje.');
            $this->getPresenter()->flashMessage('Uživatel s touto emailovou adresou již existuje.', 'error');
        }

        // Shoduji se hesla?
        if ($data->password !== $data->password_confirm){
            $form['password_confirm']->addError('Hesla se neshodují.');
            $this->getPresenter()->flashMessage('Hesla se neshodují.', 'error');
        }

        // Je heslo dostatecne dlouhe?
        if (strlen($data->password) < 8){
            $form['password']->addError('Heslo musí mít alespoň 8 znaků.');
            $this->getPresenter()->flashMessage('Heslo musí mít alespoň 8 znaků.', 'error');
        }

        // Je heslo dostatecne dlouhe?
        if (strlen($data->password_confirm) < 8){
            $form['password_confirm']->addError('Heslo musí mít alespoň 8 znaků.');
            $this->getPresenter()->flashMessage('Heslo musí mít alespoň 8 znaků.', 'error');
        }

        // Je prvek o indexu $key v poli $data null nebo prazdny?
        foreach ($data as $key => $value) {
            if ($value === null || $value === '') {
                $form[$key]->addError('Pole nesmí být prázdné.');
            }
        }
    }

    protected function sanitizeData(ArrayHash $data)
    {
        // cisteni dat
        $data->name = $this->sanitizeText($data->name);
        $data->surname = $this->sanitizeText($data->surname);
        $data->email = filter_var($data->email, FILTER_VALIDATE_EMAIL);
        $data->kraj = $this->sanitizeText($data->kraj);
        $data->okres = $this->sanitizeText($data->okres);
        $data->city = $this->sanitizeText($data->city);
        $data->street = $this->sanitizeText($data->street);
        $data->postal_code = preg_replace('/[^0-9]/', '', $data->postal_code);
        $data->correspondence_kraj = $this->sanitizeText($data->correspondence_kraj);
        $data->correspondence_okres = $this->sanitizeText($data->correspondence_okres);
        $data->correspondence_city = $this->sanitizeText($data->correspondence_city);
        $data->correspondence_street = $this->sanitizeText($data->correspondence_street);
        $data->correspondence_postal_code = preg_replace('/[^0-9]/', '', $data->correspondence_postal_code);

        //Debugger::barDump($data);
        return $data;
    }

    // zaplata na zavisle selectboxy
    protected function onAnchor(BootstrapForm $form)
    {
        $id = $form['kraj']->getValue();
        $form['okres']->setItems($id ? $this->obecModel->seznamOkresuProSelect($id) : []);

        $id = $form['okres']->getValue();
        $form['city']->setItems($id ? $this->obecModel->seznamObciProSelect($id) : []);

        $id = $form['correspondence_kraj']->getValue();
        $form['correspondence_okres']->setItems($id ? $this->obecModel->seznamOkresuProSelect($id) : []);

        $id = $form['correspondence_okres']->getValue();
        $form['correspondence_city']->setItems($id ? $this->obecModel->seznamObciProSelect($id) : []);
    }

    // email logika
    protected function sendConfirmEmail(ArrayHash $data): void
    {
        $locale = $this->prekladModel->getCurrentLocale();

        // cesta k sablone
        $templatePath = __DIR__ . '/../../Templates/Email/' . $locale . '/RegisterEmailTemplate.latte';

        // pokud sablona neexistuje, tak cesky
        if (!file_exists($templatePath)) {
            $templatePath = __DIR__ . '/../../Templates/Email/cs/RegisterEmailTemplate.latte';
        }

        $nazevKraje = $this->krajModel->resolveNazevKraje($data->kraj); $nazevKrajeKor = $this->krajModel->resolveNazevKraje($data->correspondence_kraj);
        $nazevOkresu = $this->obecModel->resolveNazevOkresu($data->kraj,$data->okres); $nazevOkresuKor = $this->obecModel->resolveNazevOkresu($data->correspondence_kraj,$data->correspondence_okres);
        $nazevObce = $this->obecModel->resolveNazevObce($data->okres,$data->city); $nazevObceKor = $this->obecModel->resolveNazevObce($data->correspondence_okres,$data->correspondence_city);
//        Debugger::barDump($nazevKraje); Debugger::barDump($data->kraj); Debugger::barDump($this->krajModel->resolveNazevKraje($data->kraj));
//        Debugger::barDump($nazevOkresu); Debugger::barDump($data->okres); Debugger::barDump($this->obecModel->resolveNazevOkresu($data->kraj,$data->okres));
//        Debugger::barDump($nazevObce); Debugger::barDump($data->city); Debugger::barDump($this->obecModel->resolveNazevObce($data->okres,$data->city));
//        Debugger::barDump($data, 'Form Data');
//        Debugger::barDump($this->prekladModel->getCurrentLocale(), 'Current Locale');
//        Debugger::barDump($nazevObce, 'Translated Obec Name');
//        Debugger::barDump($nazevObceKor, 'Translated Correspondence Obec Name');

        // vykresleni sablony - vkladani dat z formulare do mailu bez hesla
        // if() peklo kvuli spravnemu zapisu do mailu
        $latte = new \Latte\Engine;
        $params = [];
        foreach ($data as $key => $value) {
            //Debugger::barDump($key, $value);
            if ($key === 'kraj') {
                $params['nazevKraje'] = $nazevKraje;
            } elseif ($key === 'okres') {
                $params['nazevOkresu'] = $nazevOkresu;
            } elseif ($key === 'city') {
                $params['nazevObce'] = $nazevObce;
            } elseif ($key === 'correspondence_kraj') {
                $params['nazevKrajeKor'] = $nazevKrajeKor;
            } elseif ($key === 'correspondence_okres') {
                $params['nazevOkresuKor'] = $nazevOkresuKor;
            } elseif ($key === 'correspondence_city') {
                $params['nazevObceKor'] = $nazevObceKor;
            } elseif ($key !== 'password' && $key !== 'password_confirm') {
                $params[$key] = $value;
            }
        }
        $htmlBody = $latte->renderToString($templatePath, $params);

        // priprava mailu
        $mail = new Message;
        $mail->setFrom('no-reply@leschka.de')
            ->addTo($data->email)
            ->setSubject($this->getEmailSubject($locale))
            ->setHtmlBody($htmlBody);

        // posle mail
        $this->saveEmailToFile($mail, 'C:/xampp/mailoutput');
    }
    protected function getEmailSubject($locale): string
    {
        // podle locale vrati predmet mailu
        $subjects = [
            'cs' => 'Potvrzeni registrace',
            'en' => 'Registration confirmation',
            'de' => 'Anmeldungsbestätigung',
        ];

        return $subjects[$locale] ?? $subjects['cs'];
    }

    // metoda k zapisovani mailu do souboru
    protected function saveEmailToFile(Message $mail, string $outputDir): void
    {
        $locale = $this->prekladModel->getCurrentLocale();
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }
        if (!is_writable($outputDir)) {
            throw new \RuntimeException('Output directory "' . $outputDir . '" is not writable.');
        }

        // .eml soubor
        $filenameEML = sprintf(
            '%s/email_%s_'.$locale.'.eml',
            rtrim($outputDir, DIRECTORY_SEPARATOR),
            date('d_m_Y_H_i_s')
        );
        // .html soubor - pro jednodussi cteni
        $filenameHTML = sprintf(
            '%s/email_%s_'.$locale.'.html',
            rtrim($outputDir, DIRECTORY_SEPARATOR),
            date('d_m_Y_H_i_s')
        );

        file_put_contents($filenameEML, $mail->generateMessage());
        file_put_contents($filenameHTML, $mail->generateMessage());
    }
}