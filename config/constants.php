<?php
ini_set('display_errors', 0);
if (!isset($_SESSION)){
	session_start();
}
	
    define('SITEURL', 'localhost/guaranti/');
    //main admin username:
    define('ADMIN','admin');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'guaranti');
    define('SMS_UNAME', '');
    define('SMS_PASS', '');
    define('SMS_FROM', '');
    define('SMS_JSPD', '');
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>