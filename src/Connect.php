<?php

namespace Src;

use PDO;
use PDOException;

class Connect
{
    public function connection()
    {
        $host = getenv("DB_HOST");
        $db = getenv("DB_NAME");
        $user = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");

        try {
            $pdo = new PDO("mysql:host={$host};dbname={$db}", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }

    }
}
