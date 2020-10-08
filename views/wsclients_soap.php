<div class="w3-container w3-padding-large">
    <div class="w3-card-4">
        <div class="w3-container w3-khaki w3-center"><h6>SOAP kliens</h6></div>
        <div style="margin:10px;">
            <table>
                <tr>
                    <td>
                        <select class="w3-select" name="dtype" id="dtype">
                            <option value="news" selected>Hírek</option>
                            <option value="comments">Vélemények</option>
                        </select>
                    </td>
                    <td>
                        <button id="btn_soap_request" class="w3-button w3-green w3-round-xxlarge">Adatok lekérése</button>
                    </td>
                </tr>
            </table>
            <table id="datagrid"></table>
        </div> 
    </div>
</div>