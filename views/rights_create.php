<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
    <div class="w3-container w3-khaki w3-center">
        <h6>Jogosultság létrehozása<a href="<?php echo(SITE_ROOT.'rights/index'); ?>"><span class="w3-badge w3-margin-left w3-white w3-right">X</span></a></h6>    
    </div>
        <div style="padding:20px;">
            <form id="right_new_form">
                <p>
                    <label>Jogosultság neve</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="right_name" placeholder="jogosultság neve..." required>
                </p>
                <p>
                    <label>Jogosultság szintje</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="number" id="right_level" required>
                </p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_right">Jogosultság mentése</button>
            <div id="right_edit_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
        </div>
    </div>
</div>