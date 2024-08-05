<?php include('partials/menu.php'); ?>
<div class="main-content">
<div class="wrapper">
        <h1 class="text-center">فاکتور ها</h1><br><?php
if(isset($_POST['payed'])){
    if ($_POST['payid']==""){
    echo "<h2 class='error text-center'>برای تغییر وضعیت پرداخت باید کد پیگیری را وارد نمائید</h2>";
}}
if(isset($_POST['payed'])){
    if ($_POST['payid']!=""){
    $idupdate = $_POST['id'];
    $payidupdate = $_POST['payid'];
    $tblupdate = $_POST['tbl'];
    $adminphone = $_POST['adminphone'];
    $sqlupdate = "UPDATE $tblupdate SET pay = 1 , payid = '$payidupdate' WHERE id=$idupdate";
    try{
        $url = SMS_JSPD;
        $number = substr($adminphone, 1);
        $rcpt_nm = array($number);
        $param = array
        (
            'uname'=>SMS_UNAME,
            'pass'=>SMS_PASS,
            'from'=>SMS_FROM,
            'message'=>'نماینده ی عزیز فاکتور شما با کد پیگیری '.$payidupdate.' پرداخت شد
            تجارت همراه بیست چهل',
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
    $resupdate = mysqli_query($conn,$sqlupdate);
    if($resupdate){
        echo "<h2 class='success text-center'>وضعیت فاکتور $idupdate به پرداخت شده تغییر یافت</h2>";
    }
}}
if(isset($_POST['delete'])){
    $idupdate = $_POST['id'];
    $imagedel = $_POST['image'];
    $remove_path = "../images/".$imagedel;
    $remove = unlink($remove_path);
    $tblupdate = $_POST['tbl'];
    $sqlupdate = "UPDATE $tblupdate SET image1_name = '' WHERE id=$idupdate";
    $resupdate = mysqli_query($conn,$sqlupdate);
    if($resupdate & $remove){
        echo "<h2 class='error text-center'>فاکتور $idupdate با موفقیت حذف شد</h2>";
    }
}
if($admin==ADMIN){
    $sql1 = "SELECT * FROM tbl_phone WHERE image1_name != ''";
    $sql2 = "SELECT * FROM tbl_janebi WHERE image1_name != ''";
	}
if($admin!=ADMIN){
    $sql1 = "SELECT * FROM tbl_phone WHERE image1_name != '' AND admin='$admin'";
    $sql2 = "SELECT * FROM tbl_janebi WHERE image1_name != '' AND admin='$admin'";
	}
    $res1 = mysqli_query($conn,$sql1);
    $res2 = mysqli_query($conn,$sql2);
    $count1= mysqli_num_rows($res1);
    $count2= mysqli_num_rows($res2);?>
    <table class="tbl-full">
        <tr>    
            <th colspan="9" class="text-center btn-primary">تلفن همراه</th>
        </tr>
        <tr>
            <th>ردیف</th>
            <th>کد پیگیری</th>
			<?php if($admin==ADMIN){ ?>
    		<th>نماینده</th>
            <th>شماره تماس نمایندگی</th>
			<?php } ?>
            <th>مدل دستگاه</th>
            <th>وضعیت</th>
            <th>فاکتور</th>
            <th>وضعیت پرداخت</th>
			<?php if($admin==ADMIN){ ?>
    		<th>امکانات</th>
			<?php } ?>
        </tr>
    <?php
    if ($count1>0){
        $sn = 0;
        while($row1=mysqli_fetch_assoc($res1))
        {
            $sn=$sn+1;
            $id = $row1['id'];
            $cusname = $row1['cusname'];
            $cusphone = $row1['cusphone'];
            $cusid = $row1['cusid'];
            $model = $row1['model'];
            $imei = $row1['imei'];
            $pay = $row1['pay'];
            $payid = $row1['payid'];
            $adminname = $row1['admin'];
            $tbl="tbl_phone";
            $sqladmin= "SELECT * FROM tbl_admin WHERE username = '$adminname'";
            $resadmin = mysqli_query($conn,$sqladmin);
            $rowadmin = mysqli_fetch_assoc($resadmin);
            $full_name = $rowadmin['full_name'];
            $adminphone = $rowadmin['phone'];
            $status = $row1['status'];
            $description = $row1['description'];
            $image = $row1['image1_name'];
            ?>
                <tr>
                    <td><?php echo $sn; ?>.</td>
                    <td><?php echo $id; ?></td>
					<?php if($admin==ADMIN){ ?>
					<td><?php echo $full_name; ?></td>
                    <td><?php echo $adminphone; ?></td>
					<?php } ?>
                    <td><?php echo $model; ?></td>
                    <td id = "statustext"><?php if($status=="1"){echo "بررسی اولیه";}
                                                if($status=="2"){echo "عیب یابی";}
                                                if($status=="3"){echo "در انتظار قطعه";}
                                                if($status=="4"){echo "درحال تعمیر";}
                                                if($status=="5"){echo "تست نهایی";}
                                                if($status=="6"){echo "آماده ی ارسال";} ?> </td>
                    <td><a href="<?php echo SITEURL."images/".$image ?>"><img src=<?php echo SITEURL."images/".$image ?> width="200px"></a></td>
                    <td><?php if($pay){echo "<h2 class='success'>کد پیگیری پرداخت:</h2><p>$payid</p>";}
                        else{echo "<h2 class='error'>پرداخت نشده</h2>";} ?></td>
                    <td>
					<?php if($admin==ADMIN){ ?>
						<form action="" method = "POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="adminphone" value="<?php echo $adminphone; ?>">
                        <input type="hidden" name="tbl" value="<?php echo $tbl; ?>">
                        <input type="hidden" name="image" value="<?php echo $image; ?>">
                            <?php if(!$pay){?>
                                <input type="text" placeholder="کد پیگیری پرداخت" name="payid" class="tbl-input"><br><br>
                                <input class="btn-secondary" type="submit" name="payed" value="پرداخت شد"/>
                            <?php };?>
                        <input class="btn-danger" type="submit" name="delete" value="حذف"/>
                        </form>
					<?php } ?>
                    </td> 
                </tr>
              <?php }}else{
        echo "<tr class='error'><td colspan='9'>هنوز هیچ فاکتوری بارگزاری نشده است<td></tr>";
    } ?></table>
        <table class="tbl-full"><tr>
            <th colspan="9" class="text-center btn-secondary">لوازم جانبی</th>
        </tr>
        <tr>
            <th>ردیف</th>
            <th>کد پیگیری</th>
            <?php if($admin==ADMIN){ ?>
    		<th>نماینده</th>
            <th>شماره تماس نمایندگی</th>
			<?php } ?>
            <th>مدل دستگاه</th>
            <th>وضعیت</th>
            <th>فاکتور</th>
            <th>وضعیت پرداخت</th>
            <?php if($admin==ADMIN){ ?>
            <th>امکانات</th>
			<?php } ?>
        </tr>
    <?php
    if ($count2>0){
        $sn = 0;
        while($row2=mysqli_fetch_assoc($res2))
        {
            $sn=$sn+1;
            $id = $row2['id'];
            $cusname = $row2['cusname'];
            $cusphone = $row2['cusphone'];
            $cusid = $row2['cusid'];
            $model = $row2['model'];
            $imei = $row2['imei'];
            $pay = $row2['pay'];
            $payid = $row2['payid'];
            $adminname = $row2['admin'];
            $tbl="tbl_janebi";
            $sqladmin= "SELECT * FROM tbl_admin WHERE username = '$adminname'";
            $resadmin = mysqli_query($conn,$sqladmin);
            $rowadmin = mysqli_fetch_assoc($resadmin);
            $full_name = $rowadmin['full_name'];
            $adminphone = $rowadmin['phone'];
            $status = $row2['status'];
            $description = $row2['description'];
            $image = $row2['image1_name'];
            ?>
                <tr>
                    <td><?php echo $sn; ?>.</td>
                    <td><?php echo $id; ?></td>
					<?php if($admin==ADMIN){ ?>
					<td><?php echo $full_name; ?></td>
                    <td><?php echo $adminphone; ?></td>
					<?php } ?>
                    <td><?php echo $model; ?></td>
                    <td id = "statustext"><?php if($status=="1"){echo "بررسی اولیه";}
                                                if($status=="2"){echo "عیب یابی";}
                                                if($status=="3"){echo "در انتظار قطعه";}
                                                if($status=="4"){echo "درحال تعمیر";}
                                                if($status=="5"){echo "تست نهایی";}
                                                if($status=="6"){echo "آماده ی ارسال";} ?> </td>
                    <td><a href="<?php echo SITEURL."images/".$image ?>"><img src=<?php echo SITEURL."images/".$image ?> width="200px"></a></td>
                    <td><?php if($pay){echo "<h2 class='success'>کد پیگیری پرداخت:</h2><p>$payid</p>";}
                              else{echo "<h2 class='error'>پرداخت نشده</h2>";} ?></td>
                    <td>
						<?php if($admin==ADMIN){ ?>
						<form action="" method = "POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="tbl" value="<?php echo $tbl; ?>">
                        <input type="hidden" name="image" value="<?php echo $image; ?>">
                        <input type="hidden" name="adminphone" value="<?php echo $adminphone; ?>">
                            <?php if(!$pay){?>
                                <input type="text" placeholder="کد پیگیری پرداخت" name="payid" class="tbl-input"><br><br>
                                <input class="btn-secondary" type="submit" name="payed" value="پرداخت شد"/>
                            <?php };?>
                        <input class="btn-danger" type="submit" name="delete" value="حذف"/>
                        </form>
						<?php } ?>
                    </td>
                </tr>
    <?php
        }
    }
    else{
        echo "<tr class='error text-center'><td cospan='9'>هنوز هیچ فاکتوری بارگزاری نشده است<td></tr>";
    }
?></table>
</div></div>
<?php include('partials/footer.php'); ?>
