<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../style2.css"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="div_tren">

        <div id="navlist">
            <a href="index.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Quản lý</button>
                <div class="dropdown-content">
                    <a href="../san_pham/index.php">Quản lý sản phẩm</a>
                    <a href="../don_hang/index.php">Quản lý đơn hàng</a>
                    <a href="../nha_san_xuat/index.php">Quản lý nhà sản xuất</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Thống kê</button>
                <div class="dropdown-content">
                    <a href="../thong_ke/thong_ke_don.php">Thống kê đơn hàng</a>
                    <a href="../thong_ke/thong_ke_san_pham_da_ban.php">Thống kê sản phẩm bán</a>
                    <a href="../thong_ke/doanh_thu.php">Thống kê doanh thu</a>
                    <a href="../thong_ke/">Thống kê số thành viên</a>
                    <a href="../thong_ke/khach_hang_tiem_nang.php">Khách hàng tiềm năng</a>
                    <a href="../thong_ke/san_pham_theo_nha_san_xuat.php">Thống kê sản phẩm theo hãng</a>
                </div>
            </div>
            <a href="#">About Us</a>
            <a href="#">Liên hệ</a>

            <div class="search">
                <form action="" method="GET">
                    <input type="text"
                    placeholder=" Tìm kiếm tên khách hàng"
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
                <a href="../../dang_xuat.php" >Đăng xuất</a>
            <?php } ?> 
        </div>

    </div>

</div>

<h1 style="text-align: center; padding-top: 90px;">Khách hàng tiềm năng</h1>
<a href="khach_hang_tiem_nang.php">
        <p>Quay lại</p>
    </a>
<table border="1" width="100%" style="padding-top: 40px;">
    <tr style="background-color: #BEBEBE">
        <td>
            <h1>STT:</h1>
        </td>
        <td>
            <h1>Tên khách hàng:</h1>
        </td>
        <td>
            <h1>Email khách hàng:</h1>
        </td>
        <td>
            <h1>Sđt khách hàng:</h1>
        </td>
        <td>
            <h1>Địa chỉ khách hàng:</h1>
        </td>
        <td>
            <h1>Tổng số đơn khách đã đặt:</h1>
        </td>
        <td>
            <h1>Tổng số chi tiêu của khách hàng:</h1>
        </td>

    </tr>
    <?php require '../connect.php'; 
    if(isset($_GET['tim_kiem'])){
        $tim_kiem = $_GET['tim_kiem'];
        $sql = "select khach_hang.* ,sum(tong_tien) as tong_tien_khach_hang, count(hoa_don.ma) as tong_don_da_dat   from khach_hang join hoa_don on khach_hang.ma = hoa_don.ma_khach_hang where khach_hang.ten like '%$tim_kiem%' group by khach_hang.ma";

    }
    else{
         $sql = 'select khach_hang.* ,sum(tong_tien) as tong_tien_khach_hang, count(hoa_don.ma) as tong_don_da_dat   from khach_hang join hoa_don on khach_hang.ma = hoa_don.ma_khach_hang group by khach_hang.ma;';
    }
   

    $ket_qua = mysqli_query($ket_noi, $sql);
    $stt = 0;
    foreach ($ket_qua as $each) { ?>
        <tr>
            <td>
                <?php $stt++;
                echo $stt;
                ?>
            </td>
            <td>
                <?php echo $each['ten']; ?>
            </td>
            <td>
                <?php echo $each['sdt']; ?>
            </td>
            <td>
                <?php echo $each['dia_chi']; ?>
            </td>
            <td>
                <?php echo $each['ten']; ?>
            </td>
            <td>
                <?php echo $each['tong_don_da_dat']; ?>
            </td>
            <td>
                <?php echo $each['tong_tien_khach_hang']; ?>
            </td>
        </tr>
    <?php } ?>


</body>

</html>