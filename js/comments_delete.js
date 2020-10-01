$(document).ready(function(){
    $('#btn_delete_comment').click(function(evt) {
        $.ajax({
            url: 'comments/delete',
            type: 'POST',
            data: {
                'delete_comment' : 'delete_comment',
                'id' : $('#comment_id').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#comment_delete_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('comments/index');
                }
            }
        });
    });
});