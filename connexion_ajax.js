$(document).ready(function(){

    $("#form_connexion").on('submit', function(e){
        e.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        var dataString = {
            email: email,
            password: password,
        }

        $.ajax({
            type: "POST",
            url: "connexion.php",
            data: dataString,
            success: function(e){
                $('#info_messages').html(e);
            },
            error: function (xhr) {
                console.log(xhr.status);
                console.log(xhr.statusText);
              }
        });
    });
});
