$(document).ready(function(){
    $('#btn_delete_right').click(function(evt) {
        $.ajax({
            url: 'rights/delete',
            type: 'POST',
            data: {
                'delete_right' : 'delete_right',
                'id' : $('#right_id').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#right_edit_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('rights/index');
                }
            }
        });
    });
});