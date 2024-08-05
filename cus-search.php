<?php include('partials-front/menu.php'); ?>
    <section class="text-center">
        <div class="container">
            <?php 
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $searchby=$_POST['searchby'];
                if($searchby==0){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                if($searchby==1){
                    $sql = "SELECT * FROM tbl_phone WHERE id='$search'"; 
                    $sql2 = "SELECT * FROM tbl_janebi WHERE id='$search'"; 
                }
                if($searchby==2){
                    $sql = "SELECT * FROM tbl_phone WHERE cusphone='$search'"; 
                    $sql2 = "SELECT * FROM tbl_janebi WHERE cusphone='$search'"; 
                }
                if($searchby==3){
                    $sql = "SELECT * FROM tbl_phone WHERE cusid='$search'"; 
                    $sql2 = "SELECT * FROM tbl_janebi WHERE cusid='$search'"; 
                }
                if($searchby==4){
                    $sql = "SELECT * FROM tbl_phone WHERE imei='$search'"; 
                    $sql2 = "SELECT * FROM tbl_janebi WHERE imei='$search'"; 
                }
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
                    $found=TRUE;
                }
                if($count==0 && $count2==0){
                    echo "<h1>هیچ دستگاهی با این مشخصات یافت نشد</h1>";
                    $found=FALSE;
                }
            if($found){
            ?>
                <h1>کد پیگیری : <?= $id ?>  |  نام و نام خانوادگی : <?= $cusname ?>  |  مدل دستگاه : <?= $model ?>  |  تاریخ دریافت دستگاه : <?= $date ?>  |  شماره تماس : <?= $cusphone ?></h1>
                <br>
                <h1>مشکل دستگاه : <?= $description ?></h1>
                <br>
                <h1>وضعیت دستگاه : <?php
                if($status==1){echo "بررسی اولیه  |  وضعیت بعدی : بررسی توسط کارشناس";}
                elseif($status==2){echo "دردست بررسی توسط کارشناس  |  وضعیت بعدی : آماده تحویل";}
                elseif($status==3){echo "دردست بررسی توسط کارشناس  |  وضعیت بعدی : آماده تحویل";}
                elseif($status==4){echo "دردست بررسی توسط کارشناس  |  وضعیت بعدی : آماده تحویل";}
                elseif($status==5){echo "دردست بررسی توسط کارشناس  |  وضعیت بعدی : آماده تحویل";}
                elseif($status==6){echo "آماده تحویل";}    
                ?>
                </h1>
                <?php
                if($status>=1){
                    ?>
                        <div class="container text-center">
                            <h1>بررسی اولیه :</h1>
                            <p><?= $desc1 ?></p>
                            <p>تاریخ : <?= $date1 ?></p>
                        </div>
                    <?php
                }
                if($status>=2){
                    ?>
                        <div class="container text-center">
                            <h1>دردست بررسی توسط کارشناس :</h1>
                            <p>تاریخ : <?= $date2 ?></p>
                        </div>
                    <?php
                }
                if($status>=6){
                    ?>
                        <div class="container text-center">
                            <h1>آماده تحویل/ارسال :</h1>
                            <p><?= $desc6 ?></p>
                            <p>تاریخ : <?= $date6 ?></p>
                        </div>
                    <?php
                }
            }
            ?>
        </div>
    </section>
    <section class="food-menu">
        <div class="container">
    <?php include('partials-front/footer.php'); ?>