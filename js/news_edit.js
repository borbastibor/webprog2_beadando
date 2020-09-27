$(document).ready(function(){
    $('#btn_save_news').click(function(evt) {
        if ($('#cim').val() == '' || $('#hir').val() == '') {
            $('#news_edit_message_label').html('<p>Nincs minden mező kitöltve!</p>').show();
            return;
        }

        $.ajax({
            url: 'news/edit',
            type: 'POST',
            data: {
                'edit_news' : 'edit_news',
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
                }
            }
        });
        evt.preventDefault();
        location.assign('news/index');
    });
});