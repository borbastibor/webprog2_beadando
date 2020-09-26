$(document).ready(function(){
    $('#btn_save_right').click(function(evt) {
        if ($('#right_name').val() == '' || $('#right_level').val() == '') {
            $('#right_edit_message_label').html('<p>Nincs minden mező kitöltve!</p>').show();
            return;
        }

        $.ajax({
            url: 'rights/create',
            type: 'POST',
            data: {
                'create_right' : 'create_right',
                'right_name' : $('#right_name').val(),
                'right_level' : $('#right_level').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#right_edit_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                }
            }
        });
        evt.preventDefault();
        location.assign('rights/index');
    });
});