$(document).ready(function(){
    $('#btn_soap_request').click(function(evt) {
        let selected_option = $('#dtype').val();
        $.ajax({
            url: 'wsclients/req_soap',
            type: 'POST',
            data: {
                'soap_request' : 'soap_request',
                'datatype' : selected_option
            },
            dataType: 'text',
            success: function(response) {
                let msgObj = JSON.parse(response);
                if (msgObj.error == 0) {
                    let soapdata = JSON.parse(msgObj.message);
                    $('#datagrid').empty();
                    if (selected_option == 'news') {
                        $('#datagrid').append('<thead>').children('thead').
                            append('<tr class="w3-teal"/>').children('tr').
                            append('<th class="w3-border">Azon.</th><th class="w3-border">Cím</th><th class="w3-border">Hír</th><th class="w3-border">Létrehozás dátuma</th><th class="w3-border">Létrehozó</th>');
                    } else if (selected_option == 'comments') {
                        $('#datagrid').append('<thead>').children('thead').
                            append('<tr class="w3-teal"/>').children('tr').
                            append('<th class="w3-border">Azon.</th><th class="w3-border">Vélemény</th><th class="w3-border">Létrehozás dátuma</th><th class="w3-border">E-mail</th><th class="w3-border">Létrehozó</th>');
                    }
                    let $tbody = $('#datagrid').append('<tbody />').children('tbody');
                    for (let i = 0; i < soapdata.length; i++) {
                        $tbody.append('<tr />').children('tr:last');
                        for (let j = 0; j < soapdata[i].length; j++) {
                            $tbody.append('<td class="w3-border">' + soapdata[i][j] + '</td>');
                        }
                    }
                } else {
                    alert(msgObj.message);
                }
            }
        });
    });
});