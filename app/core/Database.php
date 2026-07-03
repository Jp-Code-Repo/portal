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

            $config = require __DIR__ . '/../config/database.php';

            try {

                self::$connection = new PDO(
                    sprintf(
                        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                        $config['host'],
                        $config['port'],
                        $config['database'],
                        $config['charset']
                    ),
                    $config['username'],
                    $config['password']
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