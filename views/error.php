<div class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red">
    <?php
        if ($viewData['data'] != null) {
            switch ($viewData['data']) {
                case '404':
                    echo('<h2>HIBA 404</h2><p>A kért oldal nem létezik!</p>');
                    break;

                case 'auth':
                    echo('<h2>Hozzáférés megtagadva!</h2><p>A kért oldal megtekintéséhez nem rendelkezik a szükséges jogosultságokkal!</p>');
                    break;
            }
        }
    ?>
</div>
