<?php
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_NAME', 'web2_yeduco');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASSWORD', '');
    
    class Database {
        private static $connection = FALSE;
        
        public static function getConnection() {
            if(! self::$connection) {
                self::$connection = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD,
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                self::$connection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            }
            return self::$connection;
        }
    }
