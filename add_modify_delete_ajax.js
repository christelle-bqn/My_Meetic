$(document).ready(function(){
    $('#email_error').hide();

    $("#button_add_hobby").click(function(e){
        e.preventDefault();

        var new_hobby = $("#new_hobby").val();

        var dataString = {
            new_hobby: new_hobby,
        }

        $.ajax({
            type: "POST",
            url: "new_hobby.php",
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

    $("#button_modify_password").click(function(e){
        e.preventDefault();

        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();

        var dataString = {
            old_password: old_password,
            new_password: new_password,
        }

        $.ajax({
            type: "POST",
            url: "modify_password.php",
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

    $("#button_modify_email").click(function(e){
        e.preventDefault();

        var new_email = $("#new_email").val();

        var dataString = {
            new_email: new_email,
        }

        if(isEmail(new_email)==false){
            $('#email_error').show();
            return false;
        }

        function isEmail(new_email){
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(new_email)) {
                return false;
            }else{
                return true;
            }
        }

        $.ajax({
            type: "POST",
            url: "modify_email.php",
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

    $("#button_delete").click(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "delete_account.php",
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