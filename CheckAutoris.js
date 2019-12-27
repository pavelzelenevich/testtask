jQuery(document).ready(function($){
function isValid(id, pat) {
    var value = $(id).val();
    var pattern =  new RegExp("^"+pat+"","i");
    if (pattern.test(value)) {
        console.log('valid id='+id+' value='+value);
        return true;
    }
    else {
        console.log('invalid id='+id+' value='+value);
        return false;
    }
}

var pass = false;
var email = false;
var flag = true;
var tru = false;

$(document).ready(function() {
    $("#informationEmail").text ("");

    $("#login").change( function(){
        login = isValid("#login", '^[a-zA-Z0-9_]+$');
        if(login){
            $('#login').removeClass('bad');
            $('#login').addClass('good');
            $("#informationLogin").text ("");
        }
        else {
            $('#login').removeClass('good');
            $('#login').addClass('bad');
            $("#informationLogin").text ("Введите корректный логин!");
            $('#informationLogin').addClass('badinfoemail');
        }

    });


    $("#pass").change( function(){
        pass = isValid("#pass", '^[a-zA-Z0-9]+$');
        if(pass){
            $('#pass').removeClass('bad');
            $('#pass').addClass('good');
            $("#informationPas").text ("");
        } else {
            $('#pass').removeClass('good');
            $('#pass').addClass('bad');
            $('#informationPas').removeClass('goodinfoemail');
            $('#informationPas').addClass('badinfoemail');
            $("#informationPas").text ("Некорректно!");
        }

    });

    $("#email").change( function(){
        email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
        if(email){
            $('#email').removeClass('bad');
            $('#email').addClass('good');
            $("#informationMail").text ("");
        }
        else {
            $('#email').removeClass('good');
            $('#email').addClass('bad');
            $("#informationMail").text ("Некорректный E-mail!");
            $('#informationMail').removeClass('goodinfoemail');
            $('#informationMail').addClass('badinfoemail');

        }

    });
});
});
























