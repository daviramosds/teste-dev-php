<?php

class Database {
    private static $pdo;
    private const DB_HOST = 'DB_HOST';
    private const DB_NAME = 'DB_NAME';
    private const DB_USER = 'DB_USER';
    private const DB_PASS = 'DB_PASS';

    public static function connect() {
        if (self::$pdo === null) {
            try {
                $dsn = 'mysql:host=' . getenv(self::DB_HOST) . ';dbname=' . getenv(self::DB_NAME) . ';charset=utf8mb4';
                $username = getenv(self::DB_USER);
                $password = getenv(self::DB_PASS);

                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                self::$pdo = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                self::handleConnectionError($e);
            }
        }

        return self::$pdo;
    }

    private static function handleConnectionError(PDOException $e) {
        echo '<h2>Erro ao se conectar ao banco de dados</h2>';
        echo '<p>' . $e->getMessage() . '</p>';
        exit(); 
    }
}
?>
