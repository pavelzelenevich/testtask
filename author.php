<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start();

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


if (isset($_POST['email'])){
    $filterEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}
if(isset($_POST['pass'])){
    $regPass = '/[a-zA-Z0-9]/';
    $filterPass = preg_match_all($regPass, $_POST['pass']);
//    echo $filterPass;
//    echo '<br>';
}

if (isset($_POST['email'])) {
    if ($filterEmail === false){
        setcookie("userlooser4", "ok");
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        $_SESSION['capth'] = ($_SESSION['capth']) + 1 ;
        header("location: index.php");
//        echo 'невалидный email';
    } else {
        $email = $_POST['email'];
    }
} else {
    setcookie("userlooser2", "ok");
    setcookie('userlooser4', null, -1, '/');
    unset($_COOKIE['userlooser4']);
    setcookie('userlooser3', null, -1, '/');
    unset($_COOKIE['userlooser3']);
    $_SESSION['capth'] = ($_SESSION['capth']) + 1 ;
    header("location: index.php");
//    echo 'заполните все графы!';
}

if (isset($_POST['pass'])){
    if ($filterPass !== strlen($_POST['pass'])){
        setcookie("userlooser3", "ok");
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        setcookie('userlooser4', null, -1, '/');
        unset($_COOKIE['userlooser4']);
        $_SESSION['capth'] = ($_SESSION['capth']) + 1 ;
        header("location: index.php");
//      echo 'введите валидный пароль (a-z,A-Z,0-9)';
    } else {
        $pass = $_POST['pass'];
    }
} else{
    setcookie("userlooser2", "ok");
    setcookie('userlooser4', null, -1, '/');
    unset($_COOKIE['userlooser4']);
    setcookie('userlooser3', null, -1, '/');
    unset($_COOKIE['userlooser3']);
    $_SESSION['capth'] = ($_SESSION['capth']) + 1 ;
    header("location: index.php");
//    echo 'заполните все графы!';
}

$passForEmail = 0;
if (!empty($email)){
    $respassForEm = mysqli_query($connect, "SELECT password FROM users WHERE email='$email'");
}
if (isset($respassForEm)){
    $passForEmail = mysqli_fetch_array($respassForEm);
}

$capch = 0;
if(isset($_POST['responseOfCapcha'])){
    $regC = '/[0-9]/';
    $filterCap = preg_match_all($regC, $_POST['responseOfCapcha']);
    if ($filterCap !== strlen($_POST['responseOfCapcha'])){
        $_SESSION['capth'] = ($_SESSION['capth']) + 1 ;
        header("location: index.php");
    } else {
        $capch = 10;
    }
} else {
    $capch = 5;
}



if ( (!empty($pass)) && (!empty($email)) && ($capch == 10)) {
    $sumusercapcha = $_POST['responseOfCapcha'];
    $sumcapcha = $_SESSION['num1'] + $_SESSION['num2'];
    if ((($passForEmail['password']) === ($pass)) && ($sumusercapcha == $sumcapcha) ) {
        $reslogForEm = mysqli_query($connect, "SELECT login FROM users WHERE email='$email'");
        $logForEmail = mysqli_fetch_array($reslogForEm);
        $username = $logForEmail['login'];
//        $_SESSION['user'] = 0;
        $_SESSION['capth'] = 0;
        setcookie('auth', null, -1, '/');
        unset($_COOKIE['auth']);
        setcookie('userlooser4', null, -1, '/');
        unset($_COOKIE['userlooser4']);
        setcookie('userlooser3', null, -1, '/');
        unset($_COOKIE['userlooser3']);
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        setcookie('userlooser', null, -1, '/');
        unset($_COOKIE['userlooser']);
        setcookie("auth", "ok");
        $_SESSION['autoris'] = "ok";
        setcookie("user", $username);
        header("location: topsecret.php");
    } else {
        setcookie("userlooser", "ok");
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        setcookie('userlooser3', null, -1, '/');
        unset($_COOKIE['userlooser3']);
        setcookie('userlooser4', null, -1, '/');
        unset($_COOKIE['userlooser4']);
        $_SESSION['capth'] = ($_SESSION['capth']) + 1;
        header("location: index.php");
//        echo ('E-mail либо пароль введен неверно!');
    }
} elseif ((!empty($pass)) && (!empty($email)) && ($capch == 5)) {
    if ( (($passForEmail['password']) === ($pass)) ) {
        $reslogForEm = mysqli_query($connect, "SELECT login FROM users WHERE email='$email'");
        $logForEmail = mysqli_fetch_array($reslogForEm);
        $username = $logForEmail['login'];
        $_SESSION['capth'] = 0;
        setcookie('auth', null, -1, '/');
        unset($_COOKIE['auth']);
        setcookie("auth", "ok");
        $_SESSION['autoris'] = "ok";
//        $_SESSION['user'] = $username;
        setcookie("user", $username);
        setcookie('userlooser4', null, -1, '/');
        unset($_COOKIE['userlooser4']);
        setcookie('userlooser3', null, -1, '/');
        unset($_COOKIE['userlooser3']);
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        setcookie('userlooser', null, -1, '/');
        unset($_COOKIE['userlooser']);
        $_SESSION['truOrFalseCapcha'] = true;
        header("location: topsecret.php");
    } else {
        setcookie("userlooser", "ok");
        setcookie('userlooser2', null, -1, '/');
        unset($_COOKIE['userlooser2']);
        setcookie('userlooser3', null, -1, '/');
        unset($_COOKIE['userlooser3']);
        setcookie('userlooser4', null, -1, '/');
        unset($_COOKIE['userlooser4']);
        $_SESSION['capth'] = ($_SESSION['capth']) + 1;
        header("location: index.php");
//        echo ('E-mail либо пароль введен неверно!');
    }
}