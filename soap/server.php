<?php

define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'web2_yeduco');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', '');
//define('LOG_FILE', 'log.txt');

class SoapHandler {

    private $dbconnection = FALSE;

    public function __construct() {
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|connecting to database\n", FILE_APPEND);
        try {
            $this->dbconnection = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD,
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $this->dbconnection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        } catch (PDOException $e) {
            //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|error while connecting to database: ".$e->getMessage()."\n", FILE_APPEND);
            return $e->getMessage();
        }
    }

    public function getNews() {
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s|')."call to function getNews\n", FILE_APPEND);
        $stmt = $this->dbconnection->prepare("SELECT * FROM hirek");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rarray =[];
        foreach ($result as $row) {
            $stmt = $this->dbconnection->prepare("SELECT bejelentkezes FROM felhasznalok WHERE id=:uid");
            $stmt->execute([':uid' => $row['felhasznalo_id']]);
            $username = $stmt->fetch(PDO::FETCH_ASSOC);
            $rarray[] = [
                $row['id'],
                $row['cim'],
                $row['hir'],
                $row['datum'],
                $username['bejelentkezes']
            ];
        }

        return $rarray;
    }

    public function getComments() {
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s|')."call to function getComments\n", FILE_APPEND);
        $stmt = $this->dbconnection->prepare("SELECT * FROM velemenyek");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rarray =[];
        foreach ($result as $row) {
            $stmt = $this->dbconnection->prepare("SELECT bejelentkezes FROM felhasznalok WHERE id=:uid");
            $stmt->execute([':uid' => $row['felhasznalo_id']]);
            $username = $stmt->fetch(PDO::FETCH_ASSOC);
            $rarray[] = [
                $row['id'],
                $row['velemeny'],
                $row['datum'],
                $row['email'],
                $username['bejelentkezes']
            ];
        }

        return $rarray;
    }
}
  
$options = ['uri' => 'http://localhost/soap/server.php'];

try {
    //file_put_contents(LOG_FILE, date('Y-m-d H:i:s|')."start soap server\n", FILE_APPEND);
    $server = new SOAPServer(NULL, $options);
    $handler = new SoapHandler();
    $server->setObject($handler);
    $server->handle();
} catch (SOAPFault $f) {
    echo($f->faultstring);
}