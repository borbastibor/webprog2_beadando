$(document).ready(function(){
    $('#btn_save_comment').click(function(evt) {
        if ($('#cim').val() == '' || $('#hir').val() == '') {
            $('#news_edit_message_label').html('<p>Nincs minden mező kitöltve!</p>').show();
            return;
        }

        $.ajax({
            url: 'comments/edit',
            type: 'POST',
            data: {
                'edit_comment' : 'edit_comment',
                'id' : $('#comment_id').val(),
                'velemeny' : $('#velemeny').val(),
                'email' : $('#email').val(),
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#comment_edit_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                }
            }
        });
        evt.preventDefault();
        location.assign('comments/index');
    });
});