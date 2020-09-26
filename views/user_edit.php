<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
    <div class="w3-container w3-khaki w3-center">
        <h6><?php
            if ($viewData['data']['userdata'] == null) {
                echo('Felhasználó létrehozása');
            } else {
                echo('Felhasználó szerkesztése');
            }
        ?><a href="<?php echo(SITE_ROOT.'users/index'); ?>"><span class="w3-badge w3-margin-left w3-white w3-right">X</span></a></h6>    
    </div>
        <div style="padding:20px;">
            <form id="user_edit_form">
                <input type="hidden" id="user_id" value="<?php
                    if ($viewData['data']['userdata'] != null && $viewData['data']['userdata']['id'] != null) {
                        echo($viewData['data']['userdata']['id']);
                    } else {
                        echo(0);
                    }
                ?>">
                <p>
                    <label>Családi név</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="csaladi_nev" placeholder="családi név..." value="<?php
                        if ($viewData['data']['userdata'] != null && $viewData['data']['userdata']['id'] != null) {
                            echo($viewData['data']['userdata']['csaladi_nev']);
                        }
                    ?>" required>
                </p>
                <p>
                    <label>Utónév</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="utonev" placeholder="utónév..." value="<?php
                        if ($viewData['data']['userdata'] != null && $viewData['data']['userdata']['id'] != null) {
                            echo($viewData['data']['userdata']['utonev']);
                        }
                    ?>" required>
                </p>
                <p>
                    <label>Felhasználónév</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="bejelentkezes" placeholder="felhasználónév..." value="<?php
                        if ($viewData['data']['userdata'] != null && $viewData['data']['userdata']['id'] != null) {
                            echo($viewData['data']['userdata']['bejelentkezes']);
                        }
                    ?>" required>
                </p>
                <p>
                    <label>Jelszó (csak módosítás vagy létrehozás esetén töltse ki!)</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="password" id="jelszo" required>
                </p>
                <p>
                    <label>Jelszó megerősítés (csak módosítás vagy létrehozás esetén töltse ki!)</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="password" id="jelszo_reentry" required>
                </p>
                <p>
                    <label>Jogosultság szintje</label>
                    <select class="w3-select w3-border" name="right_level" id="right_level">
                        <?php
                            if ($viewData['data']['jogok'] != null) {
                                foreach ($viewData['data']['jogok'] as $jogitem) {
                                    if ($viewData['data']['userdata'] != null && $viewData['data']['userdata']['jog_nev'] == $jogitem['jog_nev']) {
                                        $selected = ' selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo('<option value="'.$jogitem['id'].'"'.$selected.'>'.$jogitem['jog_nev'].'</option>');
                                }
                            }
                        ?>
                    </select>
                </p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_user">Felhasználó mentése</button>
            <div id="user_edit_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
        </div>
    </div>
</div>