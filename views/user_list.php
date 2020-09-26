<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>Felhasználók kezelése</h6></div>
        <div style="margin:10px;">
        <p>
            <h6>
                <button class="w3-button w3-green w3-round-xxlarge" onclick="location.href='users/edit?id=0'">Új létrehozása</button>
            </h6>
        </p> 
            <table class="w3-table-all w3-centered">
                <tr class="w3-teal">
                    <th class="w3-border">Családi név</th>
                    <th class="w3-border">Utónév</th>
                    <th class="w3-border">Felhasználónév</th>
                    <th class="w3-border">Jogosultság</th>
                    <th class="w3-border">Lehetőségek</th>
                </tr>
                <?php
                    if ($viewData['data'] != FALSE && $viewData['data']['userlist'] != null) {
                        foreach ($viewData['data']['userlist'] as $useritem) {
                                echo('<tr><td class="w3-border">'.$useritem['csaladi_nev'].'</td>');
                                echo('<td class="w3-border">'.$useritem['utonev'].'</td>');
                                echo('<td class="w3-border">'.$useritem['bejelentkezes'].'</td>');
                                echo('<td class="w3-border">'.$useritem['jog_nev'].'</td>');
                                echo('<td class="w3-border"><button class="w3-button w3-orange w3-round-xxlarge" onclick="location.href=\'users/edit?id='.$useritem['id'].'\'">Szerkeszt</button> <button class="w3-button w3-red w3-round-xxlarge" onclick="location.href=\'users/delete?id='.$useritem['id'].'\'">Eltávolít</button></td></tr>');
                        }
                    } else {
                        echo('<tr>');
                        echo('<td colspan="4">Nincs adat!</td>');
                        echo('</tr>');
                    }  
                ?>
            </table><br>
        </div> 
    </div>
</div>