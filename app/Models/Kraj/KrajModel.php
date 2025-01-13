<?php

namespace App\Models\Kraj;

use App\Models\BaseModel;

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
}