<?php include('partials-front/menu.php'); ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">لطفا یکی از گزینه های زیر را انتخاب نمائید:</h2>
            <form action="<?php echo SITEURL; ?>cus-search.php" method="POST" class="code">
                        <select name="searchby" id="searchby" class="select" required>
                            <option selected value="0">جست و جو براساس...</option>
                            <option value="1">کد پیگیری</option>
                            <option value="2">شماره همراه</option>
                            <option value="3">کدملی</option>
                            <option value="4">شماره سریال یا کد آیمای دستگاه</option>
                        </select>
                            <input type="text" name="search" class="search" required>
                            <input type="submit" name="submit" value="رهگیری" class="btn-primary rahgiri" required>                     
            </form>          
            <div class="clearfix"></div>
        </div>
    </section>
<?php include('partials-front/footer.php'); ?>