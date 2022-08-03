<?php require '../check_super_admin.php' ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../style2.css"> 

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
	body {
		font-family: 'Roboto';
		font-size: 14px;
	}
	
</style>
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
					placeholder=" Tìm kiếm mã đơn hàng"
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
<?php
$stt = 0;
require '../connect.php';
$sql = 'select san_pham.id, san_pham.ten, ifnull(sum(so_luong),0) as so_luong_san_pham_da_ban_ra from san_pham left join hoa_don_chi_tiet on san_pham.id = hoa_don_chi_tiet.ma_san_pham left join hoa_don on san_pham.id = hoa_don.ma where trang_thai = 1 or trang_thai is null group by san_pham.id order by so_luong_san_pham_da_ban_ra desc;';
$ket_qua = mysqli_query($ket_noi, $sql);

?>
<h1 style="text-align: center;">Thống kê sản phẩm</h1>
<table border="1" width="100%"  style="padding-top: 70px; height: 800px;">
	<tr style="background-color: ">
		<td width="5%">
			<h1>STT:</h1>
		</td>
		<td width="10%">
			<h1>Id sản phẩm:</h1>
		</td>
		<td width="50%">
			<h1>Tên sản phẩm:</h1>
		</td>
		<td width="20%">
			<h1>Số lượng bán ra: (sản phẩm)</h1>
		</td>

	</tr>
	<?php foreach ($ket_qua as $each) { ?>
		<tr>
			<td>
				<?php $stt++;
				echo $stt;
				?>
			</td>
			<td>
				<?php echo $each['id']; ?>
			</td>
			<td>
				<?php echo $each['ten']; ?>
			</td>
			<td>
				<?php echo $each['so_luong_san_pham_da_ban_ra'] ?>
			</td>

		</tr>

	<?php } ?>

</table>

</body>

</html>