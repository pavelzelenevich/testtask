<?php
session_start();
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
if ( (isset($_COOKIE['auth'])) && (isset($_SESSION['autoris'])) ) {
    if (($_COOKIE['auth'] === 'ok') && ($_SESSION['autoris'] === 'ok')){
        $usern = $_COOKIE['user'];
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
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
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <p>Привет, <?=$usern?></p>
            </div>
            <div class="row">
                <form action="index.php" method="post">
                    <button type="submit" name="exit">ВЫХОД</button>
                </form>

<!--                <a href="index.php" id="exit">EXIT</a>-->
            </div>
        </div>
        <div class="col-md-4"></div>
<!--        <script src="//ulogin.ru/js/ulogin.js"></script><div id="uLogin_96bfd3e5" data-uloginid="96bfd3e5"></div>-->
    </div>

</div>


</body>
</html>