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
			
			<div id="thanh_cong_cu">
				<?php if(isset($_SESSION['level'])){ ?>
					<a href="../../dang_xuat.php" >Đăng xuất</a>
				<?php } ?> 
			</div>

		</div>

	</div>
	<?php 
	require '../connect.php';
	$sql = 'select * from nha_san_xuat';
	$ket_qua = mysqli_query($ket_noi,$sql);
	?>
	<form action="" method="POST">
		<?php if (isset($_POST['nha_san_xuat'])) { ?>
			<h1>
				Nhà sản xuất: <?php echo $_POST['nha_san_xuat']; ?>
			</h1>

		<?php }   ?>
		<h1 style="text-align: center; padding-top: 70px;">Sản phẩm theo nhà sản xuất</h1>
		<select name="nha_san_xuat"> Tên nhà sản xuất
			<?php foreach ($ket_qua as $each ) {?>
				<option> <?php echo $each['ten'] ?> </option>
			<?php }  ?>
		</select>
		<button>Tìm kiếm</button>
	</form>
	<?php 
	if (isset($_POST['nha_san_xuat'])) {
		$nha_san_xuat = $_POST['nha_san_xuat'];
		$sql1 = "select san_pham.ten as ten_san_pham, san_pham.gia, san_pham.anh, san_pham.mo_ta from san_pham join nha_san_xuat on san_pham.nha_san_xuat_id = nha_san_xuat.ma where nha_san_xuat.ten = '$nha_san_xuat'";
	}
	else{
		$sql1 = "select san_pham.ten as ten_san_pham, san_pham.gia, san_pham.anh, san_pham.mo_ta from san_pham join nha_san_xuat on san_pham.nha_san_xuat_id = nha_san_xuat.ma ";
	}
	
	$ket_qua = mysqli_query($ket_noi,$sql1);
	$stt = 0;
	?>

	<table border="1" width="100%" style="padding-top: 50px">
		<tr style="background-color: #BEBEBE">
			<td>
				<h1>STT:</h1>
			</td>
			<td>
				<h1>Tên sản phẩm:</h1>
			</td>
			<td>
				<h1>Ảnh:</h1>
			</td>
			<td>
				<h1>Giá:</h1>
			</td>
			<td>
				<h1>Mô tả:</h1>
			</td>

		</tr>
		<?php foreach ($ket_qua as $each) { ?>
			<tr>
				<td>
					<?php $stt++; 
					echo "$stt";
					?>
				</td>
				<td>
					<?php echo $each['ten_san_pham']; ?>
				</td>
				<td>
					<img height="440px" src="../san_pham/anh/<?php echo $each['anh'] ?> " >
				</td>
				<td>
					<?php echo $each['gia']; ?>
				</td>
				<td>
					<?php echo $each['mo_ta']; ?>
				</td>
			</tr>
		<?php } ?> 
	</body>
	</html>