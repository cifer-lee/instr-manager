<?php

class Database {
    private static $server = 'localhost';
    private static $dbname = 'instr_manage';
    private static $user = 'root';
    private static $pass = 'yeelink';
    private static $conn;

    private function __construct() {
    }

    public static function getConnection() {
        isset($conn) || $conn = new mysqli(self::$server, self::$user, self::$pass, self::$dbname);

        $conn->set_charset('utf8');
        return $conn;
    }
}

?>
