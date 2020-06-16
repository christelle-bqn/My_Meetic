$(document).ready(function(){
    $('#email_error').hide();
    $('#hobbies_error').hide();

    $("#form_register").on('submit', function(e){
        e.preventDefault();

        var lastname = $("#lastname").val();
        var firstname = $("#firstname").val();
        var birthday = $("#birthday").val();
        var gender = $("#gender").val();
        var city = $("#city").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var array_hobbies = [];
        $('input[name="hobbies"]:checked').each(function(){
        array_hobbies.push($(this).val());
        });

        var all_hobbies = $('input[name="hobbies"]:checked').length > 0;

        var dataString = {
            lastname: lastname,
            firstname: firstname,
            birthday: birthday,
            gender: gender,
            city: city,
            email: email,
            password: password,
            hobbies: array_hobbies,
        }

        if(isEmail(email)==false){
            $('#email_error').show();
            return false;
        }
        else if(isChecked(all_hobbies)==false){
            $('#hobbies_error').show();
            return false;
        }

        function isEmail(email){
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
                return false;
            }else{
                return true;
            }
        }

        function isChecked(all_hobbies){
            if(all_hobbies){
                return true;
            }else{
                return false;
            }
        }

        $.ajax({
            type: "POST",
            url: "register.php",
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