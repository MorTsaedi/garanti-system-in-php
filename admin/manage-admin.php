<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1 class="text-center">مدیریت کاربران</h1><br>
<?php if($admin==ADMIN){ ?>
                <br/>
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }?>
                <br>
                <a href="add-admin.php" class="btn-primary">اضافه کردن</a>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی</th>
                        <th>نام کاربری</th>
                        <th>تلفن همراه</th>
                        <th>تلفن ثابت</th>
                        <th>کدملی</th>
                        <th>آدرس</th>
                        <th>کد نمایندگی</th>
                        <th>امکانات</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);
                            $sn=1;
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    $phone=$rows['phone'];
                                    $phonecte=$rows['phonecte'];
                                    $adminid=$rows['adminid'];
                                    $address=$rows['address'];
                                    ?> 
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $phonecte; ?></td>
                                        <td><?php echo $adminid; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">تغییر رمز عبور</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">تغییر مشخصات</a><br><br>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            }
                        }
                    ?>
                </table>
<?php } else{
				?>
				<div class="main-content">
    <div class="wrapper">
	<?php if(isset($_SESSION['updateuser'])){
		echo $_SESSION['updateuser'];
		unset($_SESSION['updateuser']);
	}?>
        <h1>تغییر مشخصات</h1>
        <br><br>
        <?php 
            $sql2="SELECT * FROM tbl_admin WHERE username = '$admin'";
            $res2=mysqli_query($conn, $sql2);
            if($res2==true)
            {
                $count2 = mysqli_num_rows($res2);
                if($count2==1)
                {
                    $row2=mysqli_fetch_assoc($res2);
                    $full_name = $row2['full_name'];
                    $username = $row2['username'];
                    $phone = $row2['phone'];
                    $phonecte = $row2['phonecte'];
                    $adminid = $row2['adminid'];
                    $address = $row2['address'];
                    $id = $row2['id'];
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
				<tr>
					<td colspan="2">
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">تغییر رمز عبور</a>
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
        $sql3 = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        phone = '$phone',
        phonecte = '$phonecte',
        adminid = '$adminid',
        address = '$address' 
        WHERE id='$id'
        ";
        $res3 = mysqli_query($conn, $sql3);
        if($res3==true)
        {
            $_SESSION['updateuser'] = "<div class='success'><h1>اطلاعات کاربری با موفقیت بروز رسانی شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
        }
        else
        {
            $_SESSION['updateuser'] = "<div class='error'><h1>متاسفانه بروز رسانی اطلاعات کاربری با مشکل مواجه شد</h1></div>";
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-admin.php';</script>";
        }
    }
}?>
            </div>
        </div>
<?php include('partials/footer.php'); ?>