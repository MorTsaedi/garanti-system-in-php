<?php 
    include('../config/constants.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_phone WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'><h1>دستگاه با موفقیت حذف شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-phone.php';</script>";
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'><h1>متاسفانه حذف دستگاه با مشکل مواجه شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-phone.php';</script>";
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-phone.php';</script>";
    }
?>