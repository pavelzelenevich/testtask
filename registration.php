<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start();
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
<div class="container" id="containerRegistration">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3>Регистрация</h3>
        </div>
        <div class="col-md-2"></div>
    </div>

    <form name="autorisation" method="post" action="registration.php">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 field">
                <div class="row minirows">
                    <p>Введите логин</p><br>
                </div>
                <div class="row minirows">
                    <input name='login' id="login" required type="text" placeholder="логин">
                </div>
            </div>
            <div class="col-md-7">
                <div class="row rowinfo"></div>
                <div class="row rowinfo"></div>
                <div class="row rowinfo">
                    <p id="informationLogin"></p>
                </div>
                <div class="row rowinfo"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 microrows">
                <p class="microtext">Логин может содержать буквы латинского алфавита обоих регистров и цифры, и не должен содержать пробелы и иные символы кроме символа нижнего подчеркивания (a-z, A-Z, 0-9, _ ) </p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 field">
                <div class="row minirows">
                    <p>Введите E-mail</p><br>
                </div>
                <div class="row minirows">
                    <input name='email' id="email" required type="email" placeholder="e-mail">
                </div>
            </div>
            <div class="col-md-7">
                <div class="row rowinfo"></div>
                <div class="row rowinfo"></div>
                <div class="row rowinfo">
                    <p id="informationEmail"></p>
                </div>
                <div class="row rowinfo">
                    <p id="informationEmailTwo"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 microrows">
                <p class="microtext">E-mail должен быть свободным и валидным</p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 field">
                <div class="row minirows">
                    <p>Введите пароль</p><br>
                </div>
                <div class="row minirows">
                    <input name="pass" id="pass" required type="password" placeholder="пароль">
                </div>
            </div>
            <div class="col-md-7">
                <div class="row rowinfo"></div>
                <div class="row rowinfo"></div>
                <div class="row rowinfo">
                    <p id="informationPas"></p>
                </div>
                <div class="row rowinfo">
                    <p id="informationPas1"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 microrows">
                <p class="microtext">Пароль может содержать буквы латинского алфавита обоих регистров и цифры, и не должен содержать пробелы и иные символы (a-z, A-Z, 0-9) </p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 field">
                <div class="row minirows">
                    <p>Введите пароль еще раз</p><br>
                </div>
                <div class="row">
                    <input name="passtwice" id="pass2" required type="password" placeholder="пароль повторно">
                </div>
            </div>
            <div class="col-md-7">
                <div class="row rowinfo"></div>
                <div class="row rowinfo"></div>
                <div class="row rowinfo">
                    <p id="informationPass"></p>
                </div>
                <div class="row rowinfo">
                    <p id="informationPass11"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 microrows">
                <p class="microtext">Пароль должен совпадать с паролем введенным выше</p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 field3" style="padding-left: 0">
                <button name="buttonReg" type="submit">Зарегистрироваться</button>
            </div>
            <div class="col-md-7"></div>
        </div>
    </form>
</div>
<?php
$data = [];
$file = fopen('conBd.txt','r');
while (($row = fgets($file)) !== FALSE) {
    $str = explode(', ', $row);
    $data[] = $str;
}
fclose($file);
$str0 = $str[0];
$str1 = $str[1];
$str2 = $str[2];
$connect = mysqli_connect($str0, $str1, $str2);
$dbsel = mysqli_select_db($connect, 'test');
mysqli_set_charset($connect,"utf-8");


//if ($connect == false){
//    echo '!не выполнилось подключение к mySQL';
//    echo '<br>';
//    exit();
//} else {
//    echo 'ЕСТЬ КОНТАКТ С mySQL';
//    echo '<br>';
//}

//if (!$dbsel){
//    echo '!!не выбрана бд!';
//    echo '<br>';
//    exit(mysqli_error());
//} elseif (!$connect){
//    echo '!!не законектило mysql2';
//    echo '<br>';
//    exit(mysqli_error());
//} else {
//    echo 'таблица выбрана!';
//    echo '<br>';
//}

if (isset($_POST['login'])){
    $regLogin = '/[a-zA-Z0-9_]/';
    $filterLogin = preg_match_all($regLogin, $_POST['login']);
}

//if(!empty($filterLogin)){
//    echo 'проверка валидности логина и пароля';
//    echo '<br>';
//    echo $filterLogin;
//    echo '<br>';
//}


if(isset($_POST['pass'])){
    $regPass = '/[a-zA-Z0-9]/';
    $filterPass = preg_match_all($regPass, $_POST['pass']);
//    echo $filterPass;
//    echo '<br>';
}
if (isset($_POST['email'])){
    $filterEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}
if( (isset($_POST['login'])) && (isset($_POST['pass'])) && (isset($_POST['passtwice'])) && (isset($_POST['email'])) ){
    if($filterLogin !== strlen($_POST['login'])){
        echo 'логин невалидный!';
    } else {
        if ($filterEmail === false){
            echo 'невалидный email';
        } else {
            if ($filterPass !== strlen($_POST['pass'])){
                echo 'введите валидный пароль (a-z,A-Z,0-9)';
            } else {
                if ( $_POST['pass'] === $_POST['passtwice'] ) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                } else {
                    echo 'пароли не совпадают!';
                }
            }
        }
    }
} else {
    echo 'заполните все графы!';
}

//if(isset($login) && isset($pass)&& isset($email)){
//    echo ($login);
//    echo '<br>';
//    echo ($pass);
//    echo '<br>';
//    echo ($email);
//    echo '<br>';
//}

if(!empty($login)){
    $resultlog = mysqli_query($connect, "SELECT login FROM users WHERE login='$login'");
}
if (!empty($resultlog)){
    $mysqlrowsLogin = mysqli_fetch_array($resultlog);
}

if(!empty($email)){
    $resultemail = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");
}
if (!empty($resultemail)){
    $mysqlrowsEmail = mysqli_fetch_array($resultemail);
}

if (isset($mysqlrowsLogin['login'])) {
    exit("Извините, пользователь с таким логином уже есть.");
} elseif (isset($mysqlrowsEmail['email'])) {
    exit ("Извините, пользователь с таким email уже зарегистрирован. Введите другой email.");
} else {
    if(!empty($login) && !empty($pass) && !empty($email)) {
//        echo ('Вход в добавление!');
        $addintablebd = mysqli_query($connect, "INSERT INTO users (login, email, password) VALUES ('$login','$email','$pass')") or die ("Ошибки запроса: " . mysqli_error());
    } else {
//        echo ('Не вошло в добавление!');
    }
}

if(isset($login) && isset($pass)&& isset($email)) {
    if (!$addintablebd) {
        echo '!данные не добавились!';
        echo '<br>';
    } else {
        echo "Поздравляем, вы успешно зарегистрированы!";
        echo "<br>";
        echo "<a href='index.php'>Вернуться на главную страницу</a>";
//        echo 'юзер добавлен!';
//        echo '<br>';
    }
}

mysqli_close($connect);
?>

<script src="checkLogandMail.js"></script>
</body>
</html>