<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>تغییر کلمه ی عبور</h1>
        <br><br>
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>کلمه ی عبور قبلی</td>
                    <td>
                        <input type="password" name="current_password" placeholder="پسوورد کنونی">
                    </td>
                </tr>
                <tr>
                    <td>کلمه ی عبور جدید</td>
                    <td>
                        <input type="password" name="new_password" placeholder="پسوورد جدید">
                    </td>
                </tr>
                <tr>
                    <td> تکرار کلمه ی عبور جدید</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="تکرار پسوورد جدید">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="به روزرسانی" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
                $res = mysqli_query($conn, $sql);
                if($res==true)
                {
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                        if($new_password==$confirm_password)
                        {
                            $sql2 = "UPDATE tbl_admin SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";
                            $res2 = mysqli_query($conn, $sql2);
                            if($res2==true)
                            {
                                $_SESSION['change-pwd'] = "<div class='success'><h1>کلمه ی عبور با موفقیت تغییر یافت</h1></div>";
								echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
                            }
                            else
                            {
                                $_SESSION['change-pwd'] = "<div class='error'><h1>تغییر کلمه ی عبور با مشکل مواجه شد</h1></div>";
								echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "<div class='error'><h1>کلمه ی عبور و تکرار آن یکسان نبودند</h1></div>";
							echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
                        }
                    }
                    else
                    {
                        $_SESSION['user-not-found'] = "<div class='error'>کاربر یافت نشد</div>";
						echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
                    }
                }
            }
?>
<?php include('partials/footer.php'); ?>