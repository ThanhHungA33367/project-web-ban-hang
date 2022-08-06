<?php require '../check_super_admin.php' ?>
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
	<style type="text/css">
	body {
		font-family: 'Roboto';
		font-size: 22px;
	}
</style>
</head>

<body>
	<div id="div_tren">

		<div id="navlist">
			<a href="../index.php">Home</a>
			<div class="dropdown">
				<button class="dropbtn">Quản lý</button>
				<div class="dropdown-content">
					<a href="../san_pham/index.php">Quản lý sản phẩm</a>
					<a href="../don_hang/index.php">Quản lý đơn hàng</a>
					<a href="../nha_san_xuat/index.php">Quản lý nhà sản xuất</a>
					<a href="../nhan_vien/index.php">Quản lý nhân viên</a>
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

			
		<div id="thanh_cong_cu">
			<?php if(isset($_SESSION['level'])){ ?>
				<a href="../../dang_xuat.php" >Đăng xuất</a>
			<?php } ?> 
		</div>

	</div>

</div>
	<form action="" method=POST style="padding-top: 60px;">
		Hôm nay:
		<input type="date" name="ngay">
		Tháng:
		<input type="month" name="thang">
		Năm:
		<select name="nam">
			<option></option>
			<?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
				<option><?php echo $i ?></option>
			<?php } ?>
		</select>
		<button>hiển thị</button>
	</form>
	<h1 style="text-align: center;">Thống kê doanh thu</h1>
	<table border="1" width="100%" style="padding-top: 20px;">
		<?php
		if (isset($_POST['ngay']) || isset($_POST['thang']) || isset($_POST['nam'])) { ?>
			<tr style="background-color: #BEBEBE;">
				<td>
					<h1>STT:</h1>
				</td>
				<td>
					<?php
					if ($_POST['ngay'] !== '') { ?>
						<h1>Doanh thu: <?php echo date('d/m/Y', strtotime($_POST['ngay']));
						?>
					</h1>

				<?php } ?>
				<?php
				if ($_POST['thang'] !== '') { ?>
					<h1>Doanh thu: <?php echo date('m/Y', strtotime($_POST['thang']));
					?>
				</h1>
			<?php } ?>
			<?php

			if ($_POST['nam'] !== '') { ?>
				<h1>Doanh thu: <?php echo ($_POST['nam']);
				?>
			</h1>
		<?php } ?>
	</td>

</tr>
<?php
$stt = 0;
$ngay = date('d/m/Y', strtotime($_POST['ngay']));
$thang = date('m/Y', strtotime($_POST['thang']));
$nam = $_POST['nam'];
require '../connect.php';
$sql = "select sum(tong_tien) as tong_doanh_thu from hoa_don
where (thoi_gian_dat like'%$ngay%' or thoi_gian_dat like'%$thang%' or thoi_gian_dat like'%$nam%') and (trang_thai = 1);";

$ket_qua = mysqli_query($ket_noi, $sql);

foreach ($ket_qua as $each) { ?>
	<tr >
		<td>
			<?php
			$stt++;
			echo $stt;
			?>
		</td>
		<td>
			<?php echo $each['tong_doanh_thu']; ?>
		</td>

	</tr>
<?php } ?>
<?php } ?>
</table>
</body>

</html>