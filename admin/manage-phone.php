<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>مدیریت دستگاه ها</h1>
        <br /><br />
                <a href="<?php echo SITEURL; ?>admin/check-phone.php" class="btn-primary">افزودن تلفن همراه جدید</a>
        <br /><br /><?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <table class="tbl-full">
                    <tr>
                        <th>ردیف</th>
                        <th>کد پیگیری</th>
                        <th>نام و نام خانوادگی</th>
                        <th>تلفن</th>
                        <th>کدملی</th>
                        <th>مدل تلفن همراه</th>
                        <th>کد آیمای دستگاه</th>
                        <th>تاریخ</th>
                        <th>امکانات</th>
                    </tr><?php
                        if($admin==ADMIN){
                            $sql = "SELECT * FROM tbl_phone";
                        }
                        else{
                            $sql = "SELECT * FROM tbl_phone WHERE admin = '$admin'";
                        }
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;
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
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $cusname; ?></td>
                                    <td><?php echo $cusphone; ?></td>
                                    <td><?php echo $cusid; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $imei; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-phone.php?id=<?php echo $id; ?>" class="btn-secondary">تغییر مشخصات</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-phone.php?id=<?php echo $id; ?>" class="btn-danger">حذف دستگاه</a>
                                        <a href="<?php echo SITEURL; ?>admin/details.php?id=<?php echo $id; ?>" class="btn-primary">جزئیات</a>
                                    </td>
                                </tr><?php
                            }
                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='error'> هنوز هیچ دستگاهی اضافه نشده است </td> </tr>";
                        }
                    ?>
                </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>