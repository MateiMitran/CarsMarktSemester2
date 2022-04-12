<?php

class Database {
    public static function connect() {
        $host = "studmysql01.fhict.local";
        $username = "dbi458877";
        $password = "123456";
      //      $host = '127.0.0.1';
     //       $username = 'root';
     //        $password = '';
        $database = "dbi458877";

        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
            $conn = new PDO($dsn, $username, $password);
            return $conn;
        } catch(PDOException $e) {
            errorMessage('An error occurred, please try again later');
        }
    }
}

