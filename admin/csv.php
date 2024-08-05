<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper"><?php
            if (isset($_SESSION['import'])){
            echo $_SESSION['import'];
            }?>
            <h1>بارگزاری فایل حاوی اطلاعات گارانتی و کد فعالسازی :</h1>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                فایل csv مورد نظر را انتخاب نمایید :
                <a href="<?= SITEURL.'admin/file.csv' ?>">فایل نمونه</a><br><br>
                <input type="file" name="file" accept=".csv" class="btn-secondary">
                <input type="submit" name="import" value="بارگذاری" class="btn-primary">
            </form><?php
            if (isset($_SESSION['import'])){?>
<br>
                <table class="tbl-full">
                    <tr>
                        <th colspan="6" class="btn-primary">پنج خط آخر دیتابیس</th>
                    </tr>
                    <tr>
                        <th>مدل</th>
                        <th>آیمای 1</th>
                        <th>آیمای 2</th>
                        <th>شروع گارانتی</th>
                        <th>پایان گارانتی</th>
                        <th>کد فعالسازی</th>
                    </tr>
<?php
                $sqlShow = "SELECT * FROM imeitest ORDER BY id DESC LIMIT 5";
                $resShow = mysqli_query($conn, $sqlShow);
                while ($rowShow = mysqli_fetch_assoc($resShow)){
                    ?>
                        <tr>
                            <td><?= $rowShow['model']; ?></td>
                            <td><?= $rowShow['imei1']; ?></td>
                            <td><?= $rowShow['imei2']; ?></td>
                            <td><?= $rowShow['gstart']; ?></td>
                            <td><?= $rowShow['gend']; ?></td>
                            <td><?= $rowShow['act']; ?></td>
                        </tr>
                <?php }
                    unset($_SESSION['import']); }?>
                </table>
        </div>
    </div>
<?php
if(isset($_POST['import'])){
    $fileName = $_FILES['file']['tmp_name'];
    if($_FILES['file']['size']>0){
        $file = fopen($fileName, 'r');
        fgetcsv($file,10000,",");
        while (($column = fgetcsv($file,10000,""))!==FALSE){
            $sqlInsert = "INSERT INTO imeitest (model,imei1,imei2,gstart,gend,act,num) VALUES ('" . $column[0] . "','" . $column[1] .  "','" . $column[2] .  "','" . $column[3] . "','" . $column[4] .  "','" . $column[5] . "','0')";
            $result = mysqli_query($conn,$sqlInsert);
            if($result){
                $_SESSION['import'] = "<div class='success'><h1>اطلاعات با موفقیت بارگذاری شد</h1></div><br>";
            }
            else{
                $_SESSION['import'] = "<div class='error'><h1>بارگذاری اطلاعات ناموفق بود</h1></div><br>";
            }
        }
    }
    echo "<script type='text/javascript'>document.location.href='".SITEURL."admin/csv.php';</script>";
}
?>
<?php include('partials/footer.php'); ?>