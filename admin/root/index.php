<?php require '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../../style2.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="style2.css"> --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>


<body>

    <div id="div_tong">
       <?php 
       
       if(isset($_GET['tim_kiem']))
        $tim_kiem = $_GET['tim_kiem'];
    ?>
    <div id="div_tren">

        <div id="navlist">
            <a href="index.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Quản lý</button>
                <div class="dropdown-content">
                    <a href="../san_pham/index.php">Quản lý sản phẩm</a>
                    <a href="#">Quản lý đơn hàng</a>
                    <a href="#">Quản lý nhà sản xuất</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Thống kê</button>
                <div class="dropdown-content">
                    <a href="admin/san_pham/index.php">Thống kê đơn hàng</a>
                    <a href="#">Thống kê sản phẩm bán</a>
                    <a href="#">Thống kê doanh thu</a>
                    <a href="#">Thống kê số thành viên</a>
                    <a href="#">Khách hàng tiềm năng</a>
                    <a href="#">Thống kê sản phẩm theo hãng</a>
                </div>
            </div>
            <a href="#">About Us</a>
            <a href="#">Liên hệ</a>
            
            <div class="search">
                <form action="#">
                    <input type="text"
                    placeholder=" Search Courses"
                    name="tim_kiem">
                    <button>
                        <i class="fa fa-search"
                        style="font-size: 18px;">
                    </i>
                </button>
            </form>
        </div>
        <div id="thanh_cong_cu">
            <?php if(isset($_SESSION['level'])){ ?>
                <a href="../dang_xuat.php" >Đăng xuaat</a>
            <?php } ?> 
        </div>

        
    </div>
    <img src="../san_pham/anh/1659500708.jpg" style="padding-top: 50px; padding-left: 100px; width: 95%;">
</div>
<?php include'banner2.php' ?>
<?php include'product2.php' ?>
<?php 

?> 
</div>


</body>
</html>