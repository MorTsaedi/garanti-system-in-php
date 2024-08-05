<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">تغییر وضعیت</h1>
                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                ?>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th colspan="12" class="text-center btn-primary">تلفن همراه</th>
                    </tr>
                    <tr>
                        <th>ردیف</th>
                        <th>کد پیگیری</th>
                        <th>نام و نام خانوادگی</th>
                        <th>مدل تلفن همراه</th>
                        <th>تاریخ</th>
                        <th>وضعیت</th>
                        <th>شرح مشکل</th>
                        <th>تغییر وضعیت</th>
                    </tr>
                    <?php 
                        if($admin==ADMIN){
                            $sql = "SELECT * FROM tbl_phone"; 
                        }
                        else{
                            $sql = "SELECT * FROM tbl_phone WHERE admin='$admin'";
                        }
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
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
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $cusname; ?></td>
                                        <td><?php echo $model; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php
                                        if($status==1){echo "بررسی اولیه";}
                                        elseif($status==2){echo "عیب یابی";}
                                        elseif($status==3){echo "در انتظار قطعه";}
                                        elseif($status==4){echo "درحال تعمیر";}
                                        elseif($status==5){echo "تست نهایی";}
                                        elseif($status==6){echo "آماده تحویل";}
                                        ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>&cat=1" class="btn-secondary">به روزرسانی وضعیت</a>
                                            <a href="<?php echo SITEURL; ?>admin/details.php?id=<?php echo $id; ?>" class="btn-primary">جزئیات</a>
                                        </td>
                                    </tr>
                                <?php
                            }                            
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>هنوز هیچ دستگاهی اضافه نشده است</td></tr>";
                        }
                    ?>
                    <tr>
                        <th colspan="12" class="text-center btn-secondary">لوازم جانبی</th>
                    </tr>
                    <tr>
                        <th>ردیف</th>
                        <th>کد پیگیری</th>
                        <th>نام و نام خانوادگی</th>
                        <th>مدل دستگاه</th>
                        <th>تاریخ</th>
                        <th>وضعیت</th>
                        <th>شرح مشکل</th>
                        <th>تغییر وضعیت</th>
                    </tr>
                    <?php 
                        if($admin==ADMIN){
                            $sql = "SELECT * FROM tbl_janebi";
                        }
                        else{
                            $sql = "SELECT * FROM tbl_janebi WHERE admin='$admin'";
                        }
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
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
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $cusname; ?></td>
                                        <td><?php echo $model; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php
                                        if($status==1){echo "بررسی اولیه";}
                                        elseif($status==2){echo "عیب یابی";}
                                        elseif($status==3){echo "در انتظار قطعه";}
                                        elseif($status==4){echo "درحال تعمیر";}
                                        elseif($status==5){echo "تست نهایی";}
                                        elseif($status==6){echo "آماده تحویل";}
                                        ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>&cat=2" class="btn-secondary">به روزرسانی وضعیت</a>
                                            <a href="<?php echo SITEURL; ?>admin/details.php?id=<?php echo $id; ?>" class="btn-primary">جزئیات</a>
                                        </td>
                                    </tr>
                                <?php
                            }                           
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>هنوز هیچ دستگاهی اضافه نشده است</td></tr>";
                        }
                    ?> 
                </table>
    </div>  
</div>
<?php include('partials/footer.php'); ?>