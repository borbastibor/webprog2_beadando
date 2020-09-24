$(document).ready(function(){
    $('#btn_save_right').click(function() {
        if ($('#right_name').val() == '' || $('#right_level').val() == '') {
            $('#right_edit_message_label').html('<p>Nincs minden mező kitöltve!</p>').show();
            return;
        }

        $.ajax({
            url: 'rights/edit',
            type: 'POST',
            data: {
                'edit_right' : 'edit_right',
                'right_id' : $('#right_id').val(),
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
                    location.reload();
                }
            }
        });
    });
});