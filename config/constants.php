<?php
ini_set('display_errors', 0);
if (!isset($_SESSION)){
	session_start();
}
	
    define('SITEURL', 'https://digi2040.ir/garanti/');
    define('ADMIN','admin');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'digiikal_imei');
    define('DB_PASSWORD', '5214@Digi');
    define('DB_NAME', 'digiikal_imei');
    define('SMS_UNAME', 'digi2040');
    define('SMS_PASS', '5214@Digi');
    define('SMS_FROM', '3000505');
    define('SMS_JSPD', 'https://ippanel.com/services.jspd');
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>