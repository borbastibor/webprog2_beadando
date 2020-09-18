<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Webprogramozás 2 - beadandó feladat">
        <meta name="author" content="Borbás Tibor">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beadandó feladat</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo($viewData['style']); ?>">
        <script src="js/jquery-3.5.1.min.js"></script>
        <?php $scriptinject = $viewData['jscript'] == FALSE ? '' : $viewData['jscript']; ?>
        <script>
            // oldal specifikus .js fájlok beimportálása
            jQuery(document).ready(function(){
                if ("<?php echo($scriptinject); ?>" != '') {
                    $.getScript("<?php echo($scriptinject); ?>");
                }
                
            });
        </script>
    </head>
    <body>
        <header>
            <h2 class="maintitle">Fiktív szolgálatató Kft.</h2>
        </header>
        <nav>
            <?php //echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <?php include_once($viewData['render']); ?>
        <footer> 
            &copy; Borbás Tibor <?= date("Y") ?><br>
            E-mail: <a href = "mailto:borbi.tibor@outlook.hu">borbi.tibor@outlook.hu</a>
        </footer>
    </body>
</html>
