<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
    <div class="w3-container w3-khaki w3-center">
        <h6>Jogosultság törlése<a href="<?php echo(SITE_ROOT.'rights/index'); ?>"><span class="w3-badge w3-margin-left w3-white w3-right">X</span></a></h6>    
    </div>
        <div style="padding:20px;">
            <input type="hidden" id="right_id" value="<?php echo($viewData['data']['id'] ?? 0); ?>">
            <p>
                <label>Jogosultság neve: </label>
                <?php echo($viewData['data']['jog_nev'] ?? ''); ?>
            </p>
            <p>
                <label>Jogosultság szintje: </label>
                <?php echo($viewData['data']['jog_szint'] ?? ''); ?>
            </p>
            <button class="w3-button w3-block w3-red w3-section w3-padding" id="btn_delete_right">Jogosultság törlése</button>
            <div id="right_delete_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
        </div>
    </div>
</div>