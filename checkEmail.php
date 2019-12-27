<?php
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

if(isset($_POST['email'])) {
    $filterEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}
if ($filterEmail === false){
    echo 'невалидный email';
} else {
    $checkemail = $_POST['email'];
}

if (!empty($checkemail)){
    $resultemail = mysqli_query($connect, "SELECT email FROM users WHERE email='$checkemail'");
}
if(!empty($resultemail)){
    $mysrowsEmail = mysqli_fetch_array($resultemail);
}
if(isset($mysrowsEmail['email'])){
    echo "failEmail";
}
?>