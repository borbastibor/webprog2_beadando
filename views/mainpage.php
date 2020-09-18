<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Webprogramozás 2 - beadandó feladat">
        <meta name="author" content="Borbás Tibor">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beadandó feladat</title>
        <link rel="stylesheet" type="text/css" href="<?php echo($viewData['style']); ?>">
    </head>
    <body>
        <header>
            <h2 class="header">Webprogramozás 2 beadandó feladat</h2>
        </header>
        <nav>
            <?php //echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
                <p>Phasellus wisi nulla...</p>
        </aside>
        <section>
            <?php include_once($viewData['render']); ?>
        </section>
        <footer>&copy; Borbás Tibor <?= date("Y") ?></footer>
    </body>
</html>
