jQuery('#submit_form').click(function () {
    var username = $('#username').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var message = $('#message').val();
    if (username != '' && email != '' && mobile != '' && message != '') {
        $.ajax({
            url: 'common/ajax.function.php',
            method: 'POST',
            data: 'action=contact-form&username=' + username + '&email=' + email + '&mobile=' + mobile + '&message=' + message
        }).done(function (data) {
            var msg = $.parseJSON(data);
            if(msg){
                alert(msg.message);
            }
        });
    }
});