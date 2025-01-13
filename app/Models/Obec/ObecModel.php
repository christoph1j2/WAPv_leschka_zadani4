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
}