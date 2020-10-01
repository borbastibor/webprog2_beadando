<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>Vélemények</h6></div>
        <div style="margin:10px;">
        <?php
            if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] >= 2) {
                echo('<p><h6><button class="w3-button w3-green w3-round-xxlarge" onclick="location.href=\'comments/edit?id=0\'">Új létrehozása</button></h6></p>');
            }

            if ($viewData['data'] != null) {
                foreach ($viewData['data'] as $commentsitem) {
                    if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] >= 2) {
                        $controlwidgets = '<a href="'.SITE_ROOT.'comments/delete?id='.$commentsitem['id'].'"><span class="w3-badge w3-red w3-right">X</span></a><a href="'.SITE_ROOT.'comments/edit?id='.$commentsitem['id'].'"><span class="w3-badge w3-orange w3-right">E</span></a>';
                    } else {
                        $controlwidgets = '';
                    }
                    echo('<div><div class="w3-container w3-border w3-blue bold-font">'.
                    ' &lt'.$commentsitem['felhasznalonev'].' | '.$commentsitem['datum'].'&gt'.$controlwidgets.
                    '</div><div class="w3-container w3-border text-justified">'.
                    $commentsitem['velemeny'].'</div></div><br>');
                }
            } else {
                echo('<div class="w3-container w3.border w3-center"><p>Nincs megjeleníthető hír!</p></div>');
            }
        ?>         
        </div> 
    </div>
</div>