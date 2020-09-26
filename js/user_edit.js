$(document).ready(function(){
    $('#btn_save_user').click(function(evt) {
        if ($('#csaladi_nev').val() == '' || $('#utonev').val() == '' || $('#bejelentkezes').val() == '') {
            $('#user_edit_message_label').html('<p>Nincs minden mező kitöltve!</p>').show();
            return;
        }

        if ($('#jelszo').val() != '' && $('#jelszo').val() != $('#jelszo_reentry').val()) {
            $('#user_edit_message_label').html('<p>Nem egyezik a megadott jelszó!</p>').show();
            return;
        }

        $.ajax({
            url: 'users/edit',
            type: 'POST',
            data: {
                'edit_user' : 'edit_user',
                'id' : $('#user_id').val(),
                'csaladi_nev' : $('#csaladi_nev').val(),
                'utonev' : $('#utonev').val(),
                'bejelentkezes' : $('#bejelentkezes').val(),
                'jelszo' : $('#jelszo').val(),
                'jog_id' : $('#right_level').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#user_edit_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                }
            }
        });
        evt.preventDefault();
        location.assign('users/index');
    });
});