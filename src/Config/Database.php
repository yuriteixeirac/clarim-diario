<?php

namespace App\Config;

require __DIR__ . "/../../vendor/autoload.php";

use Dotenv\Dotenv;
use PDO;

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance == null) {
            $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
            $dotenv->load();

            self::$instance = new PDO(
                $_ENV["DSN"],
                $_ENV["DB_USERNAME"],
                $_ENV["DB_PASSWORD"],
            );
        }

        return self::$instance;
    }
}
