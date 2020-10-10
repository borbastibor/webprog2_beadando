<?php

define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'web2_yeduco');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', '');
//define('LOG_FILE', 'log.txt');

// Adatbázis kapcsolat létrehozása
//file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|connecting to database\n", FILE_APPEND);
try {
    $dbconnection = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD,
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbconnection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
} catch (PDOException $e) {
    //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|error while connecting to database: ".$e->getMessage()."\n", FILE_APPEND);
    return $e->getMessage();
}

switch($_SERVER['REQUEST_METHOD']) {
    case "GET": // listázás
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|GET request\n", FILE_APPEND);
        $stmt = $dbconnection->prepare("SELECT * FROM hirek");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rarray =[];

        foreach ($result as $row) {
            $stmt = $dbconnection->prepare("SELECT bejelentkezes FROM felhasznalok WHERE id=:uid");
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
        echo(json_encode($rarray));
        break;

    case "POST": // beszúrás
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|POST request\n", FILE_APPEND);
        $stmt = $dbconnection->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes='Admin'");
        $stmt->execute();
        $userid = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $dbconnection->prepare("INSERT INTO hirek(cim, hir, datum, felhasznalo_id) VALUES(:cim, :hir, :datum, :userid)");
        $count = $stmt->execute([
            ':cim' => $_POST['cim'],
            ':hir' => $_POST['hir'],
            ':datum' => $_POST['datum'],
            ':userid' => $userid['id']
        ]);
        $newid = $dbconnection->lastInsertId();
        $result = $count." sor beszúrva. Azonosítója: ".$newid;
        echo($result);
        break;

    case "PUT": // módosítás
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|PUT request\n", FILE_APPEND);
        $data = array();
        $incoming = file_get_contents('php://input');
        parse_str($incoming, $data);
        $modositando = 'id=id';
        $params = [':id' => $data['id']];
        if($data['cim'] != '') {
            $modositando .= ', cim = :cim';
            $params[':cim'] = $data['cim'];
        }
        if($data['hir'] != '') {
            $modositando .= ', hir = :hir';
            $params[':hir'] = $data['hir'];
        }
        $stmt = $dbconnection->prepare("UPDATE hirek SET ".$modositando." WHERE id=:id");
        $count = $stmt->execute($params);
        $result = $count." módositott sor. Azonosítója: ".$data["id"];
        echo($result);
        break;

    case "DELETE": // törlés
        //file_put_contents(LOG_FILE, date('Y-m-d H:i:s')."|DELETE request\n", FILE_APPEND);
        $data = array();
        $incoming = file_get_contents('php://input');
        parse_str($incoming, $data);
        $stmt = $dbconnection->prepare("DELETE FROM hirek WHERE id=:uid");
        $count = $stmt->execute([':uid' => $data['id']]);
        $result = $count.' sor törölve. Azonosítója: '.$data['id'];
        echo($result);
        break;
}