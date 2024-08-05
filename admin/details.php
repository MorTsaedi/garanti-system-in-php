<?php include('partials/menu.php'); ?>
    <section class="text-center">
        <div class="container">
            <br><br><?php
                $search = mysqli_real_escape_string($conn, $_GET['id']);
                $sql = "SELECT * FROM tbl_phone WHERE id='$search'";
                $sql2 = "SELECT * FROM tbl_janebi WHERE id='$search'";
                $res = mysqli_query($conn, $sql);
                $res2 = mysqli_query($conn, $sql2);
                $count = mysqli_num_rows($res);
                $count2 = mysqli_num_rows($res2);
                if($count>0)
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
                    $pay = $row['pay'];
                    $payid = $row['payid'];
                    $found=TRUE;
                }
                if($count2>0)
                {
                    $row=mysqli_fetch_assoc($res2);
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
                    $pay = $row['pay'];
                    $payid = $row['payid'];
                    $found=TRUE;
                }
                if($count==0 && $count2==0){
                    echo "<h1>هیچ دستگاهی با این مشخصات یافت نشد</h1>";
                    $found=FALSE;
                }
            if($found){
            ?>
                <h1>کد پیگیری : <?php echo $id; ?>  |  نام و نام خانوادگی : <?php echo $cusname; ?>  |  مدل دستگاه : <?php echo $model; ?>  |  تاریخ دریافت دستگاه : <?php echo $date; ?>  |  شماره تماس : <?php echo $cusphone;?></h1>
                <br>
                <h1>مشکل دستگاه : <?php echo $description; ?></h1>
                <br>
                <h1>وضعیت دستگاه : <?php
                if($status==1){echo "بررسی اولیه";}
                elseif($status==2){echo "عیب یابی";}
                elseif($status==3){echo "در انتظار قطعه";}
                elseif($status==4){echo "درحال تعمیر";}
                elseif($status==5){echo "تست نهایی";}
                elseif($status==6){echo "آماده تحویل";}    
                ?>
                </h1><?php
                if($status>=1){
                    ?>
                    <div class="container text-center">
                            <h1>بررسی اولیه :</h1>
                            <p><?php echo $desc1; ?></p>
                            <p>تاریخ : <?php echo $date1 ?></p>
                        </div><?php
                }
                if($status>=2){
                    ?>
                        <div class="container text-center">

                            <h1>عیب یابی :</h1>
                            <p><?php echo $desc2; ?></p>
                            <p>تاریخ : <?php echo $date2 ?></p>
                        </div><?php
                }
                if($status>=3){
                    ?>
                        <div class="container text-center">
                            <h1>در انتظار قطعه :</h1>
                            <p><?php echo $desc3; ?></p>
                            <p>تاریخ : <?php echo $date3 ?></p>
                        </div><?php
                }
                if($status>=4){
                    ?>
                        <div class="container text-center">
                            <h1>درحال تعمیر :</h1>
                            <p><?php echo $desc4; ?></p>
                            <p>تاریخ : <?php echo $date4 ?></p>
                        </div><?php
                }
                if($status>=5){
                    ?>
                        <div class="container text-center">
                            <h1>تست نهایی :</h1>
                            <p><?php echo $desc5; ?></p>
                            <p>تاریخ : <?php echo $date5 ?></p>
                        </div><?php
                }
                if($status>=6){
                    ?>
                        <div class="container text-center">
                            <h1>آماده تحویل/ارسال :</h1>
                            <p><?php echo $desc6; ?></p>
                            <p>تاریخ : <?php echo $date6 ?></p>
                        </div><?php
                }
                if($note!=""){
                    ?>
                    <div class="container text-center">
                        <h1>یادداشت :</h1>
                        <p><?php echo $note; ?></p>
                    </div><?php
                }
                if($pay){
                    ?>
                    <div class="container text-center">
                    <h1>وضعیت فاکتور:</h1>
                        <p class="success"><strong>پرداخت شده</strong></p>
                        <p>کد پیگیری پرداخت:</p>
                        <p><?php echo $payid?></p>
                    </div><?php
                }
                if($pay==0){
                    ?>
                    <div class="container text-center">
                        <h1>وضعیت فاکتور:</h1>
                        <p class="error"><strong>پرداخت نشده</strong></p>
                    </div><?php
                }
            }
            ?>
        </div>
        <br><br>
    </section>
    <section class="food-menu">
        <div class="container">
<?php include('partials/footer.php'); ?>