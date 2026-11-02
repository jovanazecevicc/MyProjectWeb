
<?php

class Database
{
    private static ?PDO $connection = null;

    public static function connect(): PDO
    {
        if (self::$connection === null) {
            $config = require __DIR__ . '/config.php';

            $host = $config['host'];
            $database = $config['database'];
            $username = $config['username'];
            $password = $config['password'];

            $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

            self::$connection = new PDO($dsn, $username, $password);

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }

        return self::$connection;
    }
}
