<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>ورود کارکنان به پنل گارانتی</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">ورود</h1>
            <img src="../images/logo.png" alt="" class="text-center logo">
            <br><br><?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }?><br><br>
            <form action="" method="POST" class="text-center">
            نام کاربری <br>
            <input type="text" name="username" placeholder="نام کاربری را وارد نمائید"><br><br>
            پسوورد <br>
            <input type="password" name="password" placeholder="پسوورد خود را وارد نمائید"><br><br>
            <input type="submit" name="submit" value="ورود" class="btn-primary">
            <br><br>
            </form>
            <p class="text-center">Created By - <a href="https://www.digi2040.ir/">DIGI2040</a></p>
        </div>
    </body>
</html><?php if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'><h1>وارد شدید</h1></div>";
            $_SESSION['user'] = $username;
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/';</script>";
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>نام کاربری یا کلمه ی عبور صحیح نمی باشد
            </div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/login.php';</script>";
        }
    }?>