$(document).ready(function(){
  
    $('#connexion_link').click(function(event){ 
      var url = $(this).attr('href');
      $(body).load(url + '#wrapper_login');
      event.preventDefault();
    });
    
});