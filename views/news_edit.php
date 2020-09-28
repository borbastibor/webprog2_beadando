<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
    <div class="w3-container w3-khaki w3-center">
        <h6><?php
            if ($viewData['data'] == null) {
                echo('Hír létrehozása');
            } else {
                echo('Hír szerkesztése');
            }
        ?><a href="<?php echo(SITE_ROOT.'news/index'); ?>"><span class="w3-badge w3-margin-left w3-white w3-right">X</span></a></h6>    
    </div>
        <div style="padding:20px;">
            <form id="news_edit_form">
                <input type="hidden" id="news_id" value="<?php
                    if ($viewData['data'] != null) {
                        echo($viewData['data']['id']);
                    } else {
                        echo(0);
                    }
                ?>">
                <p>
                    <label>Cím</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" id="cim" placeholder="cím..." value="<?php
                        if ($viewData['data'] != null) {
                            echo($viewData['data']['cim']);
                        }
                    ?>" required>
                </p>
                <p>
                    <label>Hír</label>
                    <textarea class="w3-input w3-border w3-margin-bottom text-justified" rows="10" id="hir" placeholder="hír..." required><?php
                        if ($viewData['data'] != null) {
                            echo($viewData['data']['hir']);
                        }
                    ?></textarea>
                </p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_news">Hír mentése</button>
            <div id="news_edit_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
        </div>
    </div>
</div>