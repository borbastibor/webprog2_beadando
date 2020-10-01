$(document).ready(function(){
    $('#btn_delete_news').click(function(evt) {
        $.ajax({
            url: 'news/delete',
            type: 'POST',
            data: {
                'delete_news' : 'delete_news',
                'id' : $('#news_id').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#news_delete_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.assign('news/index');
                }
            }
        });
    });
});