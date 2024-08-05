<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>داشبورد "<?= $admin ?>" خلاصه وضعیت:</h1>
                <br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <?php 
                    if(isset($_SESSION['realadmin']))
                    {
                        echo $_SESSION['realadmin'];
                        unset($_SESSION['realadmin']);
                    }
                ?>
                <br>
                <?php
                if($admin==ADMIN){
					$sqlf="SELECT * FROM tbl_phone WHERE image1_name != '' AND pay = 0";
					$sqlff="SELECT * FROM tbl_janebi WHERE image1_name != '' AND pay = 0";
                    $resf=mysqli_query($conn,$sqlf);
                    $resff=mysqli_query($conn,$sqlff);
                    $countf=mysqli_num_rows($resf);
                    $countff=mysqli_num_rows($resff);
					$sum= $countf + $countff;
					echo "<h1>فاکتور های در انتظار پرداخت : {$sum}</h1><br>";

                    $sqll="SELECT * FROM tbl_admin";
                    $ress=mysqli_query($conn,$sqll);
                    $countt=mysqli_num_rows($ress);
                    if($countt>1)
                        {
                            while($row=mysqli_fetch_assoc($ress))
                            {
                                $admin = $row['username'];
                                $name = $row['full_name'];
                                ?>
                                <h1><?= $name ?>:</h1>
                                <div class="col-4 text-center">
                               <?php 
                                   $sql1 = "SELECT * FROM tbl_phone WHERE admin='$admin'";
                                   $res1 = mysqli_query($conn, $sql1);
                                   $sql2 = "SELECT * FROM tbl_janebi WHERE admin='$admin'";
                                   $res2 = mysqli_query($conn, $sql2);
                                   $count = mysqli_num_rows($res1) + mysqli_num_rows($res2);
                               ?>
                               <h1><?= $count ?></h1>
                               <br />
                               کل دستگاه های دریافت شده
                               </div>
                               <div class="col-4 text-center">
                               <?php 
                                   $sql8 = "SELECT * FROM tbl_phone WHERE status='4' AND admin='$admin'";
                                   $res8 = mysqli_query($conn, $sql8);
                                   $sql9 = "SELECT * FROM tbl_janebi WHERE status='4' AND admin='$admin'";
                                   $res9 = mysqli_query($conn, $sql9);
                                   $count2 = mysqli_num_rows($res8) + mysqli_num_rows($res9);
                               ?>
                               <h1><?= $count2 ?></h1>
                               <br />
                               دستگاه های درحال تعمیر
                               </div>
                               <div class="col-4 text-center">
                               <?php 
                                   $sql6 = "SELECT * FROM tbl_phone WHERE status='1' AND admin='$admin'";
                                   $res6 = mysqli_query($conn, $sql6);
                                   $sql7 = "SELECT * FROM tbl_janebi WHERE status='1' AND admin='$admin'";
                                   $res7 = mysqli_query($conn, $sql7);
                                   $count3 = mysqli_num_rows($res6) + mysqli_num_rows($res7);
                               ?>        
                               <h1><?= $count3 ?></h1>
                               <br />
                               دستگاه های در مرحله ی بررسی اولیه
                               </div>         
                               <div class="col-4 text-center">
                               <?php 
                                   $sql4 = "SELECT * FROM tbl_phone WHERE status='6' AND admin='$admin'";
                                   $res4 = mysqli_query($conn, $sql4);
                                   $sql5 = "SELECT * FROM tbl_janebi WHERE status='6' AND admin='$admin'";
                                   $res5 = mysqli_query($conn, $sql5);
                                   $count4 = mysqli_num_rows($res4) + mysqli_num_rows($res5);
                               ?>
                               <h1><?= $count4 ?></h1>
                               <br />
                               دستگاه های تحویل شده
                               </div>
                               <div class="clearfix"></div>
                               <?php
                            }
                        }
                }else{
                    ?>
                     <div class="col-4 text-center">
                    <?php 
                        $sql1 = "SELECT * FROM tbl_phone WHERE admin='$admin'";
                        $res1 = mysqli_query($conn, $sql1);
                        $sql2 = "SELECT * FROM tbl_janebi WHERE admin='$admin'";
                        $res2 = mysqli_query($conn, $sql2);
                        $count = mysqli_num_rows($res1) + mysqli_num_rows($res2);
                    ?>
                    <h1><?= $count ?></h1>
                    <br />
                    کل دستگاه های دریافت شده
                    </div>
                    <div class="col-4 text-center">
                    <?php 
                        $sql8 = "SELECT * FROM tbl_phone WHERE status='4' AND admin='$admin'";
                        $res8 = mysqli_query($conn, $sql8);
                        $sql9 = "SELECT * FROM tbl_janebi WHERE status='4' AND admin='$admin'";
                        $res9 = mysqli_query($conn, $sql9);
                        $count2 = mysqli_num_rows($res8) + mysqli_num_rows($res9);
                    ?>
                    <h1><?= $count2 ?></h1>
                    <br />
                    دستگاه های درحال تعمیر
                    </div>
                    <div class="col-4 text-center">
                    <?php 
                        $sql6 = "SELECT * FROM tbl_phone WHERE status='1' AND admin='$admin'";
                        $res6 = mysqli_query($conn, $sql6);
                        $sql7 = "SELECT * FROM tbl_janebi WHERE status='1' AND admin='$admin'";
                        $res7 = mysqli_query($conn, $sql7);
                        $count3 = mysqli_num_rows($res6) + mysqli_num_rows($res7);
                    ?>
                    <h1><?= $count3 ?></h1>
                    <br />
                    دستگاه های در مرحله ی بررسی اولیه
                    </div>
                    <div class="col-4 text-center">
                    <?php 
                        $sql4 = "SELECT * FROM tbl_phone WHERE status='6' AND admin='$admin'";
                        $res4 = mysqli_query($conn, $sql4);
                        $sql5 = "SELECT * FROM tbl_janebi WHERE status='6' AND admin='$admin'";
                        $res5 = mysqli_query($conn, $sql5);
						$count4 = mysqli_num_rows($res4) + mysqli_num_rows($res5);
                    ?>
                    <h1><?= $count4 ?></h1>
                    <br />
                    دستگاه های تحویل شده
                    </div>
                    <div class="clearfix"></div>
                    <?php
                }
                ?>
            </div>
        </div>
<?php include('partials/footer.php') ?>