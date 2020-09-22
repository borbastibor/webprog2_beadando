$(document).ready(function(){
    /**
     * Eseménykezelő a bejelentkezés gomb lenyomására
     */
    $('#btn_login').click(function() {

        $.ajax({
            url: 'home/login',
            type: 'POST',
            data: {
                'login' : 'login',
                'log_username' : $('#log_username').val(),
                'log_pswd' : $('#log_pswd').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#login_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.reload();
                }
            }
        });
    });
    
    /**
     * Eseménykezelő a regisztráció gomb lenyomására
     */
    $('#btn_register').click(function() {

        $.ajax({
            url: 'home/login',
            type: 'POST',
            data: {
                'register' : 'register',
                'reg_lastname' : $('#reg_lastname').val(),
                'reg_firstname' : $('#reg_firstname').val(),
                'reg_username' : $('#reg_username').val(),
                'reg_pswd' : $('#reg_pswd').val()
            },
            dataType: 'text',
            success: function(response) {
                var msg = JSON.parse(response);
                if (msg.error != 0) {
                    $('#register_message_label').html('<p>' + msg.message + '</p>').show();
                } else {
                    alert(msg.message);
                    location.reload();
                }
            }
        });
    });
});