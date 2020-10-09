<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>REST kliens</h6></div>
        <div style="margin:10px;">
            <table id="datagrid"></table><br><hr>
            <form id="restform">
                <p><label>Id</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="id" placeholder="id..."/></p>
                <p><label>Cím</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="cim" placeholder="cím..."/></p>
                <p><label>Hír</label>
                <textarea class="w3-input w3-border w3-margin-bottom text-justified" rows="10" id="hir" placeholder="hír..."></textarea></p>
            </form>
            <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_save_news">Hír mentése</button>
            <button class="w3-button w3-block w3-red w3-section w3-padding" id="btn_delete_news">Hír törlése</button>
            <div id="news_edit_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div><br>
        </div> 
    </div>
</div>