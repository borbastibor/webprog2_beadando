<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>Jogosultságok kezelése</h6></div>
        <div style="margin:10px;">
        <p>
            <h6>
                <button class="w3-button w3-green" onclick="location.href='<?php echo(SITE_ROOT.'rights/edit?id=0'); ?>';">Új létrehozása</button>
            </h6>
        </p> 
            <table class="w3-table-all w3-centered w3-hoverable">
                <tr class="w3-teal">
                    <th>Jogosultság megnevezése</th>
                    <th>Szintje</th>
                    <th>Lehetőségek</th>
                </tr>
                <?php
                    if ($viewData['data'] != FALSE && $viewData['data']['rightlist'] != null) {
                        foreach ($viewData['data']['rightlist'] as $rightitem) {
                                echo('<tr><td>'.$rightitem['jog_nev'].'</td>');
                                echo('<td>'.$rightitem['jog_szint'].'</td>');
                                echo('<td><a href="'.SITE_ROOT.'rights/edit?id='.$rightitem['id'].
                                    '">Szerkeszt</a>|<a href="'.SITE_ROOT.'rights/delete?id='.$rightitem['id'].'">Eltávolít</a></td></tr>');
                        }
                    } else {
                        echo('<tr>');
                        echo('<td colspan="3">Nincs adat!</td>');
                        echo('</tr>');
                    }
                    
                ?>
            </table><br>
        </div> 
    </div>
</div>