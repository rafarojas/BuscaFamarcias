$('form input#lead_id').attr('value', getCookie("exp_partnerscookie"));

//Get cookie function
    function getCookie(cookie){
     c = document.cookie.split('; ');
     cookies = {};
      for (var i=0; i<c.length; i++){
        C = c[i].split('=');
        cookies[C[0]]=C[1];
        }
        return cookies[cookie]; 
    }  
