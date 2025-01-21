<?php

namespace App\Models\Kraj;

use App\Models\BaseModel;
use Tracy\Debugger;

class KrajModel extends BaseModel
{
    function getTableName()
    {
        return 'kraj';
    }

    public function seznamKraju()
    {
        return $this->vsechnyZaznamy()->order('Kraj');
    }

    public function seznamKrajuProSelect()
    {
        return $this->seznamKraju()->fetchPairs('PostaID', 'Kraj');
    }

    // funkce pro spravny zapis adresy do mailu
    public function resolveNazevKraje(int $krajID): string
    {
        $kraj = $this->vsechnyZaznamy()->where('PostaID', $krajID)->fetch();
        //Debugger::barDump($kraj);
        return $kraj ? $kraj->Kraj : 'Unknown Region';
    }
}