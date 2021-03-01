<?php

/**
 * Handle MySQL Connection with PDO.
 * Class DB
 */
class DB {

    private string $server = 'localhost';
    private string $db = 'live3';
    private string $user = 'root';
    private string $pwd = '';

    private static ?PDO $dbInstance = null;


    /**
     * DbStatic constructor.
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user, $this->pwd);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $exception) {
            self::$dbInstance->rollBack();
            echo $exception->getMessage();
        }
    }

    /**
     * Return PDO instance.
     */
    public static function getInstance(): ?PDO {
        if( null === self::$dbInstance ) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * Avoid instance to be cloned.
     */
    public function __clone() {}
}
