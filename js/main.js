$(document).ready(function(){
    $('#btn_logout').click(function() {

        $.ajax({
            url: 'home/logout',
            type: 'POST',
            data: {
                'logout' : 'logout'
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                alert(msg.message);
                window.location.assign('home/index');
            }
        });

    });
});