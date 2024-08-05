<?php
    include('../config/constants.php'); 
    include('login-check.php');
?>
<html>
    <head>
        <title>سامانه گارانتی تجارت همراه 2040</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logo.png">
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">داشبورد</a></li>
                    <li><a href="manage-admin.php">مدیریت کاربران</a></li>
                    <li><a href="manage-janebi.php">لوازم جانبی</a></li>
                    <li><a href="manage-phone.php">تلفن همراه</a></li>
                    <li><a href="manage-order.php">تغییر وضعیت</a></li>
                    <li><a href="factor.php">فاکتور ها</a></li><?php if ($admin==ADMIN){
                    echo '<li><a href="csv.php">بارگذاری اطلاعات</a></li>';}?>
                    <li><a href="logout.php">خروج</a></li>
                </ul>
            </div>
        </div>