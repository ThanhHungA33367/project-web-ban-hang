<?php require '../check_admin.php' ?>
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
					<a href="index.php">Quản lý đơn hàng</a>
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
					placeholder=" Tìm kiếm tên nhà sản xuất"
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
<a href="index.php"> <p style="padding-top:60px">Quay lại</p> </a>
<h1 style="text-align: center;">Quản lý đơn hàng</h1>
	<table border="1" width="100%" style="padding-top: 70px;">
		<tr style="background-color: #BEBEBE;">
			<th>Mã</th>
			<th>Thời gian đặt</th>
			<th>Thông tin người nhận</th>
			<th>Thông tin người đặt</th>
			<th>Trạng thái</th>
			<th>Tổng tiền</th>
			<th>Xem</th>
			<th>Sửa</th>
		</tr>
		<?php 
		include '../connect.php';
		if(isset($_GET['tim_kiem'])){
			$tim_kiem = $_GET['tim_kiem'];
			$sql = "select hoa_don.*, khach_hang.ten as ten_khach_hang from hoa_don join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma where hoa_don.ma like '%$tim_kiem%'";
		}
		else{
			$sql = 'select hoa_don.*, khach_hang.ten as ten_khach_hang from hoa_don join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma';
		}
		$ket_qua = mysqli_query($ket_noi,$sql);

		foreach ($ket_qua as $each) {?>
			<tr>
				<td>
					<?php echo $each['ma']; ?>
				</td>
				<td>
					<?php echo $each['thoi_gian_dat']; ?>
				</td>
				<td>
					<?php echo $each['ten_nguoi_nhan']; ?>
				</td>
				<td>
					<?php echo $each['ten_khach_hang']; ?>
				</td>
				<td>
					<?php if($each['trang_thai'] == 0)
					{
						echo 'Mới đặt';
					} 
					else if($each['trang_thai'] == 1){
						echo "Đã duyệt";
					}
					?>
				</td>
				<td>
					<?php echo '$'.$each['tong_tien']; ?>
				</td>
				<td>
					<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>">Xem chi tiết</a>
				</td>
				<td>
					<?php if($each['trang_thai'] == 0) {?>
						<a href="duyet_don.php?ma=<?php echo $each['ma'] ?>&type=duyet" >Duyệt</a> 
						<a href="duyet_don.php?ma=<?php echo $each['ma'] ?>&type=huy">Hủy</a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>