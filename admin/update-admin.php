<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>تغییر مشخصات کاربر</h1>
        <br><br>
        <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE id=$id";
            $res=mysqli_query($conn, $sql);
            if($res==true)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $phone = $row['phone'];
                    $phonecte = $row['phonecte'];
                    $adminid = $row['adminid'];
                    $address = $row['address'];
                }
                else
                {
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
                }
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>نام و نام خانوادگی</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>نام کاربری</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    <td>تلفن همراه</td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone; ?>">
                    </td>
                </tr>
                <tr>
                    <td>تلفن ثابت</td>
                    <td>
                        <input type="text" name="phonecte" value="<?php echo $phonecte; ?>">
                    </td>
                </tr>
                <tr>
                    <td>کدملی</td>
                    <td>
                        <input type="text" name="adminid" value="<?php echo $adminid; ?>">
                    </td>
                </tr>
                <tr>
                    <td>آدرس</td>
                    <td>
                        <textarea name="address" cols="22" rows="3" placeholder="استان-شهر-ادامه ی آدرس"><?php echo $address; ?></textarea>
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
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $phonecte = $_POST['phonecte'];
        $adminid = $_POST['adminid'];
        $address = $_POST['address'];
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        phone = '$phone',
        phonecte = '$phonecte',
        adminid = '$adminid',
        address = '$address' 
        WHERE id='$id'
        ";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'><h1>کاربر با موفقیت بروز رسانی شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
        }
        else
        {
            $_SESSION['update'] = "<div class='error'><h1>متاسفانه بروز رسانی کاربر با مشکل مواجه شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
        }
    }
?>
<?php include('partials/footer.php'); ?>