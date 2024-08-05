<?php 
    include('../config/constants.php');
    session_destroy(); 
	echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/login.php';</script>";
?>