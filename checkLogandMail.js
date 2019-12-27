
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


// $(document).ready(function() {

var pass = false;
var pass1 = 0;
var pass2 = false;
var pass3 = 0;
var login = false;
var email = false;


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
        isComplate();
    });

    $("#pass").change( function(){
        pass = isValid("#pass", '^[a-zA-Z0-9]+$');
        if(pass){
            $('#pass').removeClass('bad');
            $('#pass').addClass('good');
            pass1 = $("#pass").val();
            $("#informationPas").text ("");
        } else {
            $('#pass').removeClass('good');
            $('#pass').addClass('bad');
            $("#informationPas").text ("Пароль введен некорректно!");
        }
        // isComplate();
    });

    $("#pass2").change( function(){
        pass2 = isValid("#pass2", '^[a-zA-Z0-9]+$');
        if(pass2){
            $("#informationPass").text ("");
            $('#pass2').removeClass('bad');
            $('#pass2').addClass('good');
            pass3 = $("#pass2").val();
        } else {
            $("#informationPass").text ("Пароль введен некорректно!");
            $('#pass2').removeClass('good');
            $('#pass2').addClass('bad');
        }
        // isComplate();
    });

    $("#pass2").change( function (){
            if (pass1 != pass3){
                $("#informationPass11").text ("Пароли не совпадают!");
            }
            else {
                $("#informationPass11").text ("");
            }
        });
    $("#pass").change( function (){
        if (pass1 != pass3){

            $("#informationPass11").text ("Пароли не совпадают!");
        }
        else {
            $("#informationPass11").text ("");
        }
    });


    $("#email").change( function(){
        email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
        if(email){
            $("#email").keyup(function data () {
                let email = $("#email").val();
                $.ajax ({
                    type: "POST",
                    url: "checkEmail.php",
                    cache: false,
                    data: {'email': email},
                    dataType: "html",
                    success: function (response){
                        if(response == "failEmail"){
                            $('#email').removeClass('good');
                            $('#email').addClass('bad');


                            $('#informationEmail').removeClass('goodinfoemail');
                            $('#informationEmail').addClass('badinfoemail');

                            $("#informationEmail").text ("Введенный E-mail уже занят");
                            $("#informationEmailTwo").text ("");


                            // alert("Email занят")
                        } else {
                            $('#email').removeClass('bad');
                            $('#email').addClass('good');
                            $('#informationEmail').removeClass('badinfoemail');
                            $('#informationEmail').addClass('goodinfoemail');
                            $("#informationEmail").text ("E-mail свободен!");
                            $("#informationEmailTwo").text ("");

                        }
                    }
                });
            });
        }
        else {
            $('#email').removeClass('good');
            $('#email').addClass('bad');
            $("#informationEmailTwo").text ("Введите корректный E-mail!");

            $('#informationEmail').removeClass('goodinfoemail');
            $('#informationEmail').addClass('badinfoemail');
            $("#informationEmail").text ("");
        }
        // isComplate();
    });
});