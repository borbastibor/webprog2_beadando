$(document).ready(function(){
    $('#btn_login').click(function() {

        $.ajax({
            url: '../controllers/AccessController.php',
            type: 'POST',
            data: {
                'login' : 'login',
                'log_username' : $('#log_username').val(),
                'log_pswd' : $('#log_pswd').val()
            },
            dataType: 'text',
            success: function(response) {
                alert(response);
            }
        });
    });
    
    $('#btn_register').click(function() {

        $.ajax({
            url: '../controllers/AccessController.php',
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
                alert(response);
            }
        });
    });
});