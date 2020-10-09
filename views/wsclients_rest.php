<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>REST kliens</h6></div>
        <div style="margin:10px;">
            <table class="w3-table-all w3-centered" id="datagrid">
                <tr class="w3-teal">
                    <th class="w3-border">Azon.</th>
                    <th class="w3-border">Cím</th>
                    <th class="w3-border">Hír</th>
                    <th class="w3-border">Létrehozás dátuma</th>
                    <th class="w3-border">Létrehozó</th>
                </tr>
                <?php
                    foreach ($viewData['data'] as $item) {
                        echo('<tr><td class="w3-border">'.$item[0].'</td><td class="w3-border">'.$item[1].'</td><td class="w3-border">'.$item[2].'</td><td class="w3-border">'.$item[3].'</td><td class="w3-border">'.$item[4].'</td></tr>');
                    }
                ?>
            </table><br>
            <div class="w3-container w3-center w3-teal"><h6>Hír szerkesztése, létrehozása és törlése</h6></div>
            <form id="restform">
                <p><label>Id</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="news_id" placeholder="id..."/></p>
                <p><label>Cím</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="cim" placeholder="cím..."/></p>
                <p><label>Hír</label>
                <textarea class="w3-input w3-border w3-margin-bottom text-justified" rows="10" id="hir" placeholder="hír..."></textarea></p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_news">Hír mentése</button>
            <button class="w3-button w3-block w3-red w3-section w3-padding" id="btn_delete_news">Hír törlése</button>
            <div id="news_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div><br>
        </div> 
    </div>
</div>