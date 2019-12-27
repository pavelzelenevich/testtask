<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
$str = [];
$file = fopen('conBd.txt','r');
while (($row = fgets($file)) !== FALSE) {
    $str[] = $row;
}
fclose($file);

session_start();
//$_SESSION['hostBd'] = $str[0];
//$_SESSION['userBd'] = $str[1];
//$_SESSION['passwordBd'] = $str[2];
if (isset($_POST['exit'])){
        $_SESSION['autoris'] = "";
        unset($_COOKIE);
        setcookie('auth', 'no');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3>Авторизация</h3>
        </div>
        <div class="col-md-2"></div>
    </div>
    <form name="autorisation" method="post" action="author.php">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 field">
                <div class="row minirows">
                    <p>Введите E-mail</p><br>
                </div>
                <div class="row">
                    <div class="col-md-6" style="padding-left: 0">
                        <input name='email' id="email" required type="email" placeholder="e-mail">
                    </div>
                    <div class="col-md-6">
                        <p id="informationMail"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 field">
                <div class="row minirows">
                    <p>Введите пароль</p><br>
                </div>
                <div class="row">
                    <div class="col-md-6" style="padding-left: 0">
                        <input name="pass" id="pass" required type="password" placeholder="пароль">
                    </div>
                    <div class="col-md-6">
                        <p id="informationPas"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

<!--       блок капчи!!!!-->

        <div class="row microrows2">
            <div class="col-md-2"></div>
            <div class="col-md-8 field2">
                <div class="row">
                    <?php
//                    print_r ($_SESSION['capth']);
                    if (isset($_SESSION['capth'])){
                        if ($_SESSION['capth'] >= 3) {
                            //создать и вывести капчу
                            $_SESSION['num1'] = rand(1, 9);
                            $_SESSION['num2'] = rand(1, 9);
                            $quest = 'Сколько будет:';
                            $resp = 'Введите ответ:';?>
                    <div class="row minirows2"><p><?=$quest?></p><br/></div>
                    <div class="row minirows2"><p><?=$_SESSION['num1'] . " плюс " . $_SESSION['num2']?></p><br/></div>
                    <div class="row minirows2"><p><?=$resp?></p></div>
                    <div class="row minirows2"><?='<input type="number" required name="responseOfCapcha" placeholder="введите ответ">'?></div>
                            <?php } } ?>
                </div>
                <div class="row"></div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4 field3" style="padding-left: 0">
                <button name="buttonAutoris" type="submit">Авторизоваться</button>
            </div>
            <div class="col-md-4 field3">
                <a href="registration.php">Зарегистрироваться</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p><?php
                if ((isset($_COOKIE['userlooser'])) && ($_COOKIE['userlooser'] == 'ok')) {
                    $corrE = "E-mail либо пароль введен неверно!";
                    echo ($corrE);
                }
                if ((isset($_COOKIE['userlooser2'])) && ($_COOKIE['userlooser2'] == 'ok')) {
                    $emptGr = "Заполните все графы!";
                    echo ($emptGr);
                }
                if ((isset($_COOKIE['userlooser3'])) && ($_COOKIE['userlooser3'] == 'ok')) {
                    $corrPass = "Введите валидный пароль (a-z,A-Z,0-9)!";
                    echo ($corrPass);
                }
                if ((isset($_COOKIE['userlooser4'])) && ($_COOKIE['userlooser4'] == 'ok')) {
                    $invEm = "Невалидный email!";
                    echo ($invEm);
                }
            ?></p>
        </div>
    </div>
<!--    <script src="//ulogin.ru/js/ulogin.js"></script><div id="uLogin_96bfd3e5" data-uloginid="96bfd3e5"></div>-->
</div>

<script src="checkAutoris.js"></script>
</body>
</html>
<?php
//if (!empty($s)){
//    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
//    $user = json_decode($s, true);
//}
//$user['network'] - соц. сеть, через которую авторизовался пользователь
//$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
//$user['first_name'] - имя пользователя
//$user['last_name'] - фамилия пользователя
?>