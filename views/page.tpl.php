<?php
use includes\Menu;

?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Webprogramozás 2 - beadandó feladat">
        <meta name="author" content="Borbás Tibor">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beadandó feladat</title>
        <!-- általános stílus lapok beimportálása -->
        <link rel="stylesheet" type="text/css" href="<?php echo(SITE_ROOT.'css/w3.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(SITE_ROOT.'css/mainstyles.css'); ?>">
        <!-- oldal specifikus stíluslap beimportálása -->
        <link rel="stylesheet" type="text/css" href="<?php echo($viewData['style']); ?>">
        <!-- jQuery beimportálása -->
        <script type="text/javascript" src="<?php echo(SITE_ROOT.'js/jquery-3.5.1.min.js'); ?>"></script>
        <!-- main.js beimportálása -->
        <script type="text/javascript" src="<?php echo(SITE_ROOT.'js/main.js'); ?>"></script>
        <!-- oldal specifikus javascript fájlok beimportálása -->
        <?php 
            $scriptinject = $viewData['jscript'] == FALSE ? '' : $viewData['jscript'];
            if ($scriptinject != '') {
                echo('<script type="text/javascript" src="'.$scriptinject.'"></script>');
            }
        ?>
    </head>
    <body>
        <header class="w3-container w3-teal">
            <h2 class="maintitle">Fiktív szolgáltató Kft.</h2>
        </header>
        <nav class="w3-bar w3-border w3-light-grey">
            <?php
                echo(Menu::getMenu());
                if (isset($_SESSION['username'])) {
                    echo('<a href="#" id="btn_logout" class="w3-bar-item w3-button w3-red w3-right">Kijelentkezés</a>');
                } else {
                    echo('<a href="'.SITE_ROOT.'home/login" class="w3-bar-item w3-button w3-green w3-right">Bejelentkezés/Regisztráció</a>');
                }
            ?>
        </nav>
        <?php include_once($viewData['render']); ?>
        <footer class="w3-container w3-teal"> 
            &copy; Borbás Tibor <?= date("Y") ?><br>
            E-mail: <a href = "mailto:borbi.tibor@outlook.hu">borbi.tibor@outlook.hu</a>
        </footer>
    </body>
</html>
