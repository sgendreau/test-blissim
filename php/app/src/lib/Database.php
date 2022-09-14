<?php

namespace App\Lib;

use PDO;

class Database
{
    const DATABASE_DNS = 'pgsql:host=db;port=5432;dbname=test_blissim_sgc';
    const DATABASE_USER = 'blissim';
    const DATABASE_PASSWORD = 'products';

    private ?PDO $connexion;

    public function __construct() {
        $this->connexion = $this->connect();
    }

    private function connect() {
        try {
            return new PDO(self::DATABASE_DNS, self::DATABASE_USER, self::DATABASE_PASSWORD);
        } catch(\PDOException $e) {
            printf('Connexion failed : %s\n', $e->getMessage());
            exit();
        }
    }

    public function getConnexion() {
        return $this->connexion;
    }
}
