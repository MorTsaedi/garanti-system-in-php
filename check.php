<?php include('partials-front/menu.php');
include ('jdf.php');?>
<div class="text-center">
    <div class="container">
    <h2>بررسی گارانتی تلفن همراه</h2><br><br>
        <form method="post" action="">
        <h2 class="text-center">لطفا کد آیمای اول را وارد نمایید:</h2><br>
        <input type="text" class="search" name="imeicode" placeholder="کد 15 رقمی IMEI"><br>
        <input type="submit" name="check" value="بررسی" class="btn-primary rahgiri">
    </form><br><br><?php if (isset($_POST["imeicode"])){
			$imeicode = mysqli_real_escape_string($conn, $_POST['imeicode']);
            $sql = "SELECT * FROM imeitest WHERE imei1 = '$imeicode'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                $row=mysqli_fetch_assoc($res);
                $gend=$row['gend'];
                $model=$row['model'];
                $nowyear = jdate('Y','','','','en');
                $nowmonth = jdate('m','','','','en');
                $nowday = jdate('d','','','','en');
                $gyear=substr($gend, 0, 4);
                $gmonth=substr($gend, 5, 2);
                $gday=substr($gend, 8, 2);
                $g = FALSE;
                if ($nowyear<$gyear){
                    $g = TRUE;
                }
                elseif ($nowyear==$gyear){
                    if ($nowmonth<$gmonth){
                        $g = TRUE;
                    }
                    elseif ($nowmonth==$gmonth){
                        if ($nowday<$gday) {
                            $g = TRUE;
                        }
                    }
                }
                if ($g){
                    ?>
                    <h1 class='success'>تلفن همراه وارد شده شامل گارانتی میباشد</h1><br>
                    <table class="text-center container">
                        <tr>
                            <td>کد آیمای یک تلفن همراه : </td>
                            <td><b><?= $imeicode ?></b></td>
                        </tr>
                        <tr>
                            <td>مدل تلفن همراه : </td>
                            <td><b><?= $model ?></b></td>
                        </tr>
                        <tr>
                            <td>تاریخ اتمام گارانتی : </td>
                            <td class="success"><b><?= $gend ?></b></td>
                        </tr>
                    </table><?php
                }
                if (!$g){
                    ?>
                    <h1 class='error'>متاسفانه گارانتی تلفن همراه به اتمام رسیده است</h1><br>
                    <table class="text-center container">
                        <tr>
                            <td>کد آیمای یک تلفن همراه : </td>
                            <td><b><?= $imeicode ?></b></td>
                        </tr>
                        <tr>
                            <td>مدل تلفن همراه : </td>
                            <td><b><?= $model ?></b></td>
                        </tr>
                        <tr>
                            <td>تاریخ اتمام گارانتی : </td>
                            <td class="error"><b><?= $gend ?></b></td>
                        </tr>
                    </table><?php
                }
            }
            else{
                echo "<h1 class='error'>دستگاه مورد نظر در سامانه ی گارانتی یافت نشد</h1>";
            } }?>
    </div>
</div>
<?php include ('partials-front/footer.php');?>