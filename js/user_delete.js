$(document).ready(function(){
    $('#btn_delete_user').click(function(evt) {
        $.ajax({
            url: 'users/delete',
            type: 'POST',
            data: {
                'delete_user' : 'delete_user',
                'id' : $('#user_id').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#user_delete_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('users/index');
                }
            }
        });
    });
});