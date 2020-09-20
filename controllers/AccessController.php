<?php
include_once('../includes/includes.inc.php');

if (isset($_POST['login'])) {
    $userModel = new Felhasznalok(Database::getConnection());
    $user = $userModel->getByUsername($_POST['log_username']);

    if ($user != null) {

    } else {
        echo(json_encode(new Response(true, 'Nincs ilyen felhasználó!')));
    }

} elseif (isset($_POST['register'])) {
    echo('Ez regisztráció lesz!');
}