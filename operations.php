<?php
echo $_POST['login'], "<br>";
echo $_REQUEST['password'], "<br>";
$login = $_POST['login'];
$pass = $_REQUEST['password'];

include_once('nav_man.php');
if ($login == "admin" && $pass == "admin") {

    include_once('book_reservation.php');
    echo "jest ok";

} else {

    echo "nie jest ok";
}
?>