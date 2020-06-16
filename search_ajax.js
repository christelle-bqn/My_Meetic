$(document).ready(function(){
    $('#city_error').hide();
    $('#hobbies_error').hide();

    $("#form_search_members").on('submit', function(e){
        e.preventDefault();

        var gender = $("#gender").val();
        var array_cities = [];
        $('input[name="city"]:checked').each(function(){
            array_cities.push($(this).val());
        })
        var array_hobbies = [];
        $('input[name="hobbies"]:checked').each(function(){
            array_hobbies.push($(this).val());
        });
        var age = $('input[name="age"]:checked').val();

        var all_cities = $('input[name="city"]:checked').length > 0;
        var all_hobbies = $('input[name="hobbies"]:checked').length > 0;

        var dataString = {
            gender: gender,
            city: array_cities,
            hobbies: array_hobbies,
            age: age,
        }

        if(isChecked(all_cities)==false){
            $('#city_error').show();
            return false;
        }
        else if(isChecked(all_hobbies)==false){
            $('#hobbies_error').show();
            return false;
        }

        function isChecked(all_cities){
            if(all_cities){
                return true;
            }else{
                return false;
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
            url: "search_members.php",
            data: dataString,
            success: function(e){
                $('#results').html(e);
            },
            error: function (xhr) {
                console.log(xhr.status);
                console.log(xhr.statusText);
              }
        });
    });
});