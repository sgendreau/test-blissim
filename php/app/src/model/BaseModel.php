<?php

namespace App\Model;

use App\Lib\Database;

class BaseModel
{
    protected Database $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getConnexion() {
        return $this->database->getConnexion();
    }
}
