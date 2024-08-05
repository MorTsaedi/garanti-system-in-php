<?php include('partials/menu.php');
include ('../jdf.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>بررسی گارانتی تلفن همراه</h1><br><br>
        <form method="post" action="">
        <label> کد آیمای اول را وارد نمایید:</label><br>
        <input type="text" class="search" name="imeicode" placeholder="کد 15 رقمی IMEI">
        <input type="submit" name="check" value="بررسی" class="btn-primary">
    </form><br><br><?php if (isset($_POST["imeicode"])){
            $imeicode = $_POST['imeicode'];
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
                    <h1 class='success'>تلفن همراه وارد شده شامل گارانتی میباشد</h1><br><br>
                    <table class="tbl-30">
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
                        <tr>
                            <td colspan="2">
                                <form method="post" action="<?= SITEURL.'admin/add-phone.php' ?>">
                                    <input type="hidden" name="model" value="<?php echo $model; ?>">
                                    <input type="hidden" name="imeicode" value="<?php echo $imeicode; ?>">
                                    <input type="submit" name="add-phone" value="اضافه کردن تلفن همراه" class="btn-secondary">
                                </form>
                            </td>
                        </tr>
                    </table><?php
                }
                if (!$g){
                    ?>
                    <h1 class='error'>متاسفانه گارانتی تلفن همراه به اتمام رسیده است</h1><br><br>
                    <table class="tbl-30">
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
<?php include ('partials/footer.php');?>