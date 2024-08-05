<?php 
    include('../config/constants.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'><h1>کاربر با موفقیت حذف شد</h1></div>";
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'><h1>حذف کاربر با مشکل مواجه شد</h1></div>";
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
    }
?>