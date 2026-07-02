<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {

            $host = DB_HOST;
            $dbname = DB_NAME;
            $username = DB_USER;
            $password = DB_PASS;

            try {

                self::$connection = new PDO(
                    "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
                    $username,
                    $password
                );

                self::$connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

                self::$connection->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );

            } catch (PDOException $e) {

                die('Database Connection Failed: ' . $e->getMessage());

            }

        }

        return self::$connection;
    }
}