<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Webprogramozás 2 - beadandó feladat">
        <meta name="author" content="Borbás Tibor (YEDUCO)">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo(SITE_ROOT); ?>css/main_style.css">
    </head>
    <body>
        <header>
            <h1 class="header">Web-programozás II - MVC alkalmazás</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
                <p>Phasellus wisi nulla...</p>
        </aside>
        <section>
            <?php include($viewData['render']); ?>
        </section>
        <footer>&copy; NJE - GAMF - Informatika Tanszék <?= date("Y") ?></footer>
    </body>
</html>
