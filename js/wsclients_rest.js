$(document).ready(function() {
    $('#btn_save_news').click(function(evt) {
        if ($('#news_id').val() == '' && $('#cim').val() == '' || $('#hir') == '') {
            $('#news_message_label').html('<p>Létrehozáshoz adja meg a címet és a szöveget is!</p>').show();
            return;
        }

        if ($('#news_id').val() != '' && $('#news_id').val() < 1) {
            $('#news_message_label').html('<p>Módosításhoz hibás azonosítót adott meg!</p>').show();
            return;
        }

        $.ajax({
            url: 'wsclients/req_rest',
            type: 'POST',
            data: {
                'rest_ins_upd' : 'rest_ins_upd',
                'id' : $('#news_id').val(),
                'cim' : $('#cim').val(),
                'hir' : $('#hir').val(),
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#news_edit_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('wsclients/rest');
                }
            }
        });
    });

    $('#btn_delete_news').click(function(evt) {
        const nid = $('#news_id').val();
        if (nid == '' || nid < 1) {
            $('#news_message_label').html('<p>Törléshez hibás azonosítót adott meg!</p>').show();
            return;
        }
        $.ajax({
            url: 'wsclients/req_rest',
            type: 'POST',
            data: {
                'rest_delete' : 'rest_delete',
                'id' : $('#news_id').val(),
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#news_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('wsclients/rest');
                }
            }
        });
    });
});