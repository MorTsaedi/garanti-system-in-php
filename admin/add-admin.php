<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>اضافه کردن کاربر جدید</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']); 
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>نام و نام خانوادگی</td>
                    <td>
                        <input type="text" name="full_name" placeholder="بصورت فارسی">
                    </td>
                </tr>
                <tr>
                    <td>شماره همراه</td>
                    <td>
                        <input type="text" name="phone" placeholder="0915...">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>شماره تلفن ثابت</td>
                    <td>
                        <input type="text" name="phonecte" placeholder="021...">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>کدملی</td>
                    <td>
                        <input type="text" name="adminid" placeholder="0670566659">
                    </td>
                </tr>
                <tr>
                    <td>آدرس</td>
                    <td>
                        <textarea name="address" cols="22" rows="3" placeholder="استان-شهر-ادامه ی آدرس"></textarea>
                    </td>
                </tr>
                <tr>  
                    <td>نام کاربری</td>
                    <td>
                        <input type="text" name="username" placeholder="بصورت انگلیسی">
                    </td>
                </tr>
                <tr>     
                    <td>کلمه ی عبور</td>
                    <td>
                        <input type="password" name="password" placeholder="رمز">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="اضافه کن" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $phonecte = $_POST['phonecte'];
        $adminid = $_POST['adminid'];
        $address = $_POST['address'];
        $password = md5($_POST['password']); 
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password',
            address='$address',
            phonecte='$phonecte',
            adminid='$adminid',
            phone='$phone'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'><h1>کاربر با موفقیت اضافه شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
        }
        else
        {
            $_SESSION['add'] = "<div class='error'><h1>متاسفانه کاربر اضافه نشد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/add-admin.php';</script>";
        }
    } 
?>