<?php

namespace App;

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
            echo "Connected to MySQL successfully!";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
}
