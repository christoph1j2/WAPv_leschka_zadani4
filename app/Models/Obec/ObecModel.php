<?php

namespace App\Models\Obec;

use App\Models\BaseModel;
use Tracy\Debugger;

class ObecModel extends BaseModel
{

    function getTableName()
    {
        return 'obec';
    }

    public function seznamOkresu($krajId)
    {
        return $this->vsechnyZaznamy()
            ->where('KrajID', $krajId)
            ->where('Okres IS NOT NULL')
            ->group('OkresID')
            ;
    }

    public function seznamObci($okresID)
    {
        return $this->vsechnyZaznamy()
            ->where('OkresID', $okresID)
            ->where('Obec IS NOT NULL')
            ->group('ObecID')
            ;
    }

    public function seznamOkresuProSelect($krajId)
    {
        $result = $this->seznamOkresu($krajId)
            ->fetchPairs('OkresID', 'Okres');

        return $result;
    }

    public function seznamObciProSelect($okresId)
    {
        $result = $this->vsechnyZaznamy()
            ->where('OkresID', $okresId)
            ->where('Obec IS NOT NULL')
            ->group('ObecID')
            ->fetchPairs('ObecID', 'Obec');

        return $result;
    }

    // funkce pro spravny zapis adresy do mailu
    public function resolveNazevOkresu(int $krajID, int $okresID)
    {
        $okres = $this->seznamOkresu($krajID)->where('OkresID', $okresID)->fetch();
        return $okres ? $okres->Okres : 'Unknown Region';
    }

    public function resolveNazevObce(int $okresID, int $obecID)
    {
        $obec = $this->seznamObci($okresID)->where('ObecID', $obecID)->fetch();
        return $obec ? $obec->Obec : 'Unknown Region';
    }
}