<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>افزودن لوازم جانبی جدید</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>نام و نام خانوادگی مشتری</td>
                    <td>
                        <input type="text" name="cusname" placeholder="بصورت فارسی">
                    </td>
                </tr>
                <tr>
                    <td>شماره تماس مشتری</td>
                    <td>
                        <input type="text" name="cusphone" placeholder="0915...">
                    </td>
                </tr>
                <tr>
                    <td>کد ملی مشتری</td>
                    <td>
                        <input type="text" name="cusid" placeholder="0670566659">
                    </td>
                </tr>
                <tr>
                    <td>مدل دستگاه</td>
                    <td>
                        <input type="text" name="model" placeholder="xiaomi note 13 pro">
                    </td>
                </tr>
                <tr>
                    <td>شماره سریال دستگاه</td>
                    <td>
                        <input type="text" name="imei" placeholder="IMEI">
                    </td>
                </tr>
                <tr>
                    <td>شرح مشکلات دستگاه</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="اضافه کن" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                include ('../jdf.php');
                $cusname = $_POST['cusname'];
                $description = $_POST['description'];
                $cusphone = $_POST['cusphone'];
                $cusid = $_POST['cusid'];
                $model = $_POST['model'];
                $imei = $_POST['imei'];
                $date = jdate('H:i-Y/n/j','','','','en');
                $sql2 = "INSERT INTO tbl_janebi SET 
                    cusname = '$cusname',
                    description = '$description',
                    cusphone = '$cusphone',
                    cusid = '$cusid',
                    model = '$model',
                    imei = '$imei',
                    admin = '$admin',
                    date = '$date'
                ";
                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    $sql3 = "SELECT * FROM tbl_janebi WHERE cusid = $cusid AND cusphone = $cusphone";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                    if($count3==1)
                    {
                        $row=mysqli_fetch_assoc($res3);
                        $id = $row['id'];
                    }
                    $_SESSION['add'] = "<div class='success'><h1>دستگاه با موفقیت اضافه شد</h1></div>";
                    try{
                        $url = "https://ippanel.com/services.jspd";
                        $number = substr($cusphone, 1);
                        $rcpt_nm = array($number);
                        $param = array
                        (
                            'uname'=>'digi2040',
                            'pass'=>'5214@Digi',
                            'from'=>'3000505',
                            'message'=>$cusname." عزیز دستگاه ".$model." شما با کد پیگیری ".$id." در سامانه گارانتی ثبت شد 
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
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-janebi.php';</script>";
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'><h1>متاسفانه افزودن دستگاه با مشکل مواجه شد</h1></div>";
					echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/manage-janebi.php';</script>";
                }
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>