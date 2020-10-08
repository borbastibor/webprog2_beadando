$(document).ready(function(){
    $('#btn_soap_request').click(function(evt) {
        $.ajax({
            url: 'wsclients/req_soap',
            type: 'POST',
            data: {
                'soap_request' : 'soap_request',
                'datatype' : $('#dtype').val()
            },
            dataType: 'text',
            success: function(response) {
                var msgObj = JSON.parse(response);
                if (msgObj.error != 0) {
                    // Táblázat feltöltése
                    alert(msgObj.message)
                } else {
                    alert(msgObj.message);
                }
            }
        });
    });
});