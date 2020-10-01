<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
    <div class="w3-container w3-khaki w3-center">
        <h6><?php
            if ($viewData['data'] == null) {
                echo('Vélemény létrehozása');
            } else {
                echo('Vélemény szerkesztése');
            }
        ?><a href="<?php echo(SITE_ROOT.'comments/index'); ?>"><span class="w3-badge w3-margin-left w3-white w3-right">X</span></a></h6>    
    </div>
        <div style="padding:20px;">
            <form id="comment_edit_form">
                <input type="hidden" id="comment_id" value="<?php
                    if ($viewData['data'] != null) {
                        echo($viewData['data']['id']);
                    } else {
                        echo(0);
                    }
                ?>">
                <p>
                    <label>Vélemény</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="velemeny" placeholder="vélemény..." value="<?php
                        if ($viewData['data'] != null) {
                            echo($viewData['data']['velemeny']);
                        }
                    ?>" required>
                </p>
                <p>
                    <label>E-mail cím</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="email" id="email" placeholder="email..." value="<?php
                        if ($viewData['data'] != null) {
                            echo($viewData['data']['email']);
                        }
                    ?>" required>
                </p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_comment">Vélemény mentése</button>
            <div id="comment_edit_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
        </div>
    </div>
</div>