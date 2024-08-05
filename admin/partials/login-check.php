<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'><h2>لطفا ابتدا وارد حساب کاربری خود شوید</h2></div>";
        header('location:'.SITEURL.'admin/login.php');
    }
    else{
        $admin = $_SESSION['user'];
    }
?>