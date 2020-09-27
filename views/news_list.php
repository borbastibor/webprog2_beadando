<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>Hírek</h6></div>
        <div style="margin:10px;">
        <p>
            <h6>
                <button class="w3-button w3-green w3-round-xxlarge" onclick="location.href='news/edit'">Új létrehozása</button>
            </h6>
        </p>
        <?php
            if ($viewData['data']['newslist'] != null) {
                foreach ($viewData['data']['newslist'] as $newsitem) {
                    echo('<div><div class="w3-container w3-gray">'.$newsitem['cim'].'</div><div class="w3-container">'.$newsitem['hir'].'</div></div>');
                }
            } else {
                echo('<div class="w3-container w3-center"><p>Nincs megjeleníthető hír!</p></div>');
            }
        ?>         
        </div> 
    </div>
</div>