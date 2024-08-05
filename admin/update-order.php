<?php include('partials/menu.php'); ?>
<div class="main-content">
<section class="wrapper">
    <h1 class="text-center">تغییر وضعیت</h1>
    <br><br><?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $cat=$_GET['cat'];
        if($cat==1){
            $tbl = "tbl_phone";
        }
        if($cat==2){
            $tbl = "tbl_janebi";
        }
        $sql = "SELECT * FROM $tbl WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $id = $row['id'];
            $cusname = $row['cusname'];
            $cusphone = $row['cusphone'];
            $cusid = $row['cusid'];
            $model = $row['model'];
            $imei = $row['imei'];
            $date = $row['date'];
            $time = $row['time'];
            $status = $row['status'];
            $description = $row['description'];
            $desc1 = $row['desc1'];
            $desc2 = $row['desc2'];
            $desc3 = $row['desc3'];
            $desc4 = $row['desc4'];
            $desc5 = $row['desc5'];
            $desc6 = $row['desc6'];
            $date1 = $row['date1'];
            $date2 = $row['date2'];
            $date3 = $row['date3'];
            $date4 = $row['date4'];
            $date5 = $row['date5'];
            $date6 = $row['date6'];
            $note = $row['note'];
            $image1_name=$row['image1_name'];
            $descshow = "desc".$status ;
            $dateshow = "date".$status ;
        }
        else
        {
			echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-order.php';</script>";
        }
    }
    else
    {
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-order.php';</script>";
    }?><form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>کد پیگیری</td>
                <td><b><?php echo $id; ?></b></td>
            </tr>
            <tr>
                <td>نام و نام خانوادگی</td>
                <td>
                    <b><?php echo $cusname; ?></b>
                </td>
            </tr>
            <tr>
                <td>شماره تماس مشتری</td>
                <td>
                    <b><?php echo $cusphone; ?></b>
                </td>
            </tr>
            <tr>
                <td>مدل دستگاه</td>
                <td>
                    <b><?php echo $model; ?></b>
                </td>
            </tr>
            <tr>
                <td>شرح مشکل</td>
                <td>
                    <b><?php echo $description; ?></b>
                </td>
            </tr>
            <tr>
                <td>وضعیت</td>
                <td>
                    <select name="status" id="status" onchange="selectstatus()">
                        <option <?php if($status=="1"){echo "selected";} ?> value="1">بررسی اولیه</option>
                        <option <?php if($status=="2"){echo "selected";} ?> value="2">عیب یابی</option>
                        <option <?php if($status=="3"){echo "selected";} ?> value="3">در انتظار قطعه</option>
                        <option <?php if($status=="4"){echo "selected";} ?> value="4">درحال تعمیر</option>
                        <option <?php if($status=="5"){echo "selected";} ?> value="5">تست نهایی</option>
                        <option <?php if($status=="6"){echo "selected";} ?> value="6">آماده ی ارسال</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td id = "statustext">شرح وضعیت <?php if($status=="1"){echo "بررسی اولیه";}
                    if($status=="2"){echo "عیب یابی";}
                    if($status=="3"){echo "در انتظار قطعه";}
                    if($status=="4"){echo "درحال تعمیر";}
                    if($status=="5"){echo "تست نهایی";}
                    if($status=="6"){echo "آماده ی ارسال";} ?> </td>
                <td>
                    <textarea name="description" id = "statusdesc" rows="3"><?php echo $row[$descshow] ?></textarea>
                </td>
            </tr>
            <tr>
                <td id = "statustext">یادداشت</td>
                <td>
                    <textarea name="note" id = "note" rows="3"><?php echo $note ?></textarea>
                </td>
            </tr>
            <tr><?php
                if ($image1_name!=""){
                    echo "<td>تغییر فاکتور</td>";
                    $img_ec = "<td><a href=".SITEURL."images/".$image1_name."><img src=".SITEURL."images/".$image1_name.' width="200px"></a></td>';
                    echo $img_ec;
                }
                else{
                    echo "<td>بارگزاری عکس فاکتور</td>";
                }?><td>
                    <input type="file" name="image1">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="cusname" value="<?php echo $cusname; ?>">
                    <input type="hidden" name="cusphone" value="<?php echo $cusphone; ?>">
                    <input type="hidden" name="model" value="<?php echo $model; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="به روزرسانی وضعیت دستگاه" class="btn-secondary">
                </td></tr></table></form><?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $cusname = $_POST['cusname'];
        $cusphone = $_POST['cusphone'];
        $model = $_POST['model'];
        $status = $_POST['status'];
        $note = $_POST['note'];
        $description = $_POST['description'];
        $sqldesc = "desc".$status;
        $sqldate = "date".$status;
        include ('../jdf.php');
        $newdate = jdate('H:i-Y/n/j','','','','en');
        if(isset($_FILES['image1']['name']))
        {
            $image_name = $_FILES['image1']['name'];
            if($image_name!="")
            {
                $array = explode('.', $image_name);
                $ext = end($array);
                $image_name = $id.rand(0000, 9999).'.'.$ext;
                $src_path = $_FILES['image1']['tmp_name'];
                $dest_path = "../images/".$image_name;
                $upload = move_uploaded_file($src_path, $dest_path);
                if($upload==false)
                {
                    $_SESSION['upload'] = "<div class='error'><h1>بارگزاری عکس با مشکل مواجه شد</h1></div>";
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-order.php';</script>";
                }
                if($image1_name!="")
                {
                    $remove_path = "../images/".$image1_name;
                    $remove = unlink($remove_path);
                    if($remove==false)
                    {
                        $_SESSION['remove-failed'] = "<div class='error'><h1>حذف عکس قبلی با مشکل مواجه شد</h1></div>";
						echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-order.php';</script>";
                    }
                }
            }
            else
            {
                $image_name = $image1_name;
            }
        }
        else
        {
            $image_name = $image1_name;
        }
        $sql2 = "UPDATE $tbl SET 
                    status = '$status',
                    note = '$note',
                    image1_name = '$image_name',
                    $sqldesc = '$description',
                    $sqldate = '$newdate'
                    WHERE id=$id
                ";
        if($status==6)
        {
            try{
                $url = SMS_JSPD;
                $number = substr($cusphone, 1);
                $rcpt_nm = array($number);
                $param = array
                (
                    'uname'=>SMS_UNAME,
                    'pass'=>SMS_PASS,
                    'from'=>SMS_FROM,
                    'message'=>$cusname." عزیز دستگاه ".$model." شما آماده ی تحویل میباشد
                            گارانتی تجارت همراه بیست چهل",
                    'to'=>json_encode($rcpt_nm),
                    'op'=>'send'
                );
                $handler = curl_init($url);
                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                $response2 = curl_exec($handler);
                $response2 = json_decode($response2);
                $res_code = $response2[0];
                $res_data = $response2[1];
            }
            catch(Exception $e) {
            }
        }
        $res2 = mysqli_query($conn, $sql2);
        if($res2)
        {
            $_SESSION['update'] = "<div class='success'><h1>به روزرسانی وضعیت با موفقیت انجام شد</h1></div>";
        }
        else
        {
            $_SESSION['update'] = "<div class='error'><h1>به روزرسانی وضعیت با مشکل مواجه شد</h1></div>";
        }
		echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-order.php';</script>";
    }?>
</section>
</div>
<div class="footer">
            <div class="wrapper">
                <p class="text-center">2024 All rights reserved, DIGI2040. Developed By - <a href="https://digi2040.ir/"> DIGI2040</a></p>
            </div>
</div>
</body>
<script>
function selectstatus(){
    let status = document.getElementById('status').value
    if(status == 1){
        statusname = "بررسی اولیه"
        desc = <?php echo $desc1 ?>
    }
    else if(status == 2){
        statusname = "عیب یابی"
        desc = <?php echo $desc2 ?>
    }
    else if(status == 3){
        statusname = "در انتظار قطعه"
        desc = <?php echo $desc3 ?>
    }
    else if(status == 4){
        statusname = "درحال تعمیر"
        desc = <?php echo $desc4 ?>
    }
    else if(status == 5){
        statusname = "تست نهایی"
        desc = <?php echo $desc5 ?>
    }
    else if(status == 6){
        statusname = "آماده ی ارسال"
        desc = <?php echo $desc6 ?>
    }
    document.getElementById("statustext").innerHTML = " شرح وضعیت" +" "+ statusname
    document.getElementById("statusdesc").innerHTML = desc
}</script></html>
