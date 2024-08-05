<?php include('partials/menu.php'); ?>
<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM tbl_janebi WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $cusname = $row2['cusname'];
        $description = $row2['description'];
        $cusphone = $row2['cusphone'];
        $cusid = $row2['cusid'];
        $model = $row2['model'];
        $imei = $row2['imei'];
    }
    else
    {
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-janebi.php';</script>";
    }?>
<div class="main-content">
    <div class="wrapper">
        <h1>تغییر مشخصات</h1>
        <br><br>
        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>نام و نام خانوادگی مشتری</td>
                <td>
                    <input type="text" name="cusname" value="<?php echo $cusname; ?>">
                </td>
            </tr>
            <tr>
                <td>شماره تماس مشتری</td>
                <td>
                    <input type="text" name="cusphone" value="<?php echo $cusphone; ?>">
                </td>
            </tr>
            <tr>
                <td>کدملی مشتری</td>
                <td>
                    <input type="text" name="cusid" value="<?php echo $cusid; ?>">
                </td>
            </tr>
            <tr>
                <td>مدل دستگاه</td>
                <td>
                    <input type="text" name="model" value="<?php echo $model; ?>">
                </td>
            </tr>
            <tr>
                <td>شماره سریال دستگاه</td>
                <td>
                    <input type="text" name="imei" value="<?php echo $imei; ?>">
                </td>
            </tr>
            <tr>
                <td>شرح مشکلات دستگاه</td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="به روز رسانی" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                $cusname = $_POST['cusname'];
                $description = $_POST['description'];
                $cusphone = $_POST['cusphone'];
                $cusid = $_POST['cusid'];
                $model = $_POST['model'];
                $imei = $_POST['imei'];
                $id = $_POST['id'];              
                $sql3 = "UPDATE tbl_janebi SET 
                    cusname = '$cusname',
                    description = '$description',
                    cusphone = $cusphone,
                    cusid = '$cusid',
                    model = '$model',
                    imei = '$imei'
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);
                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'><h1>مشخصات دستگاه با موفقیت به روزرسانی شد</h1></div>";
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-janebi.php';</script>";
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'><h1>متاسفانه به روزرسانی دستگاه با مشکل مواجه شد</h1></div>";
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-janebi.php';</script>";
                } 
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>