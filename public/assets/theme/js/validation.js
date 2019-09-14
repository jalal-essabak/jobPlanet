$(document).ready(function() {
    $('#submit').click(function(event){
        data = $('input[name=password]').val();
        var len = data.length;
        if(len < 4) {
            alert("Le format du mot de passe n'est pas valide");
            event.preventDefault();
        }
         
        if($('input[name=password]').val() != $('input[name=password-confirmation]').val()) {
            alert("Les mots de passe doivent être identiques.");
            event.preventDefault();
        }
         
    });
});