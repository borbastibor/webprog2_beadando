<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>Jogosultságok kezelése</h6></div>
        <div style="margin:10px;">
        <p>
            <h6>
                <button class="w3-button w3-green w3-round-xxlarge" onclick="location.href='rights/create'">Új létrehozása</button>
            </h6>
        </p> 
            <table class="w3-table-all w3-centered">
                <tr class="w3-teal">
                    <th class="w3-border">Jogosultság megnevezése</th>
                    <th class="w3-border">Szintje</th>
                    <th class="w3-border">Lehetőségek</th>
                </tr>
                <?php
                    if ($viewData['data'] != FALSE && $viewData['data']['rightlist'] != null) {
                        foreach ($viewData['data']['rightlist'] as $rightitem) {
                                echo('<tr><td class="w3-border">'.$rightitem['jog_nev'].'</td>');
                                echo('<td class="w3-border">'.$rightitem['jog_szint'].'</td>');
                                echo('<td class="w3-border"><button class="w3-button w3-red w3-round-xxlarge" onclick="location.href=\'rights/delete?id='.$rightitem['id'].'\'">Eltávolít</button></td></tr>');
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