<?php

namespace App\Models;

use Nette\Database\Connection;
use Nette\Database\Explorer;
use Nette\Security\Passwords;
use Nette\SmartObject;
use Nette\Utils\ArrayHash;

abstract class BaseModel
{
    // Chytry objekt
    use SmartObject;

    /** @var Explorer */
    protected $explorer;

    /** @var Connection */
    protected $database;

    /** @var Passwords */
    protected $passwords;

    public function __construct(Explorer $explorer, Passwords $passwords)
    {
        $this->explorer = $explorer;
        $this->database = $explorer->getConnection();
        $this->passwords = $passwords;
    }

    abstract function getTableName();

    public function vsechnyZaznamy()
    {
        return $this->explorer->table($this->getTableName());
    }

    public function insert($data)
    {
        return $this->vsechnyZaznamy()->insert($data);
    }
}