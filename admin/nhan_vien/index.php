<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
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
					<a href="index.php">Quản lý nhân viên</a>
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
					placeholder=" Tìm kiếm nhân viên"
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

<a href="nhap.php">
	<p style="padding-top: 60px;">Thêm nhân viên</p>
</a>
<a href="index.php">Quay lại</a>

<h1 style="text-align:center">
	Quản lý nhân viên
</h1>
<?php 
require'../connect.php';
if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
	$sql = "select * from admin where ten like '%$tim_kiem%'";

}	
else{
	$sql = "select * from admin" ;
}
$ketqua = mysqli_query($ket_noi,$sql);
?>

<table border="1" width="100%" style="padding-top:60px">

	<tr style="background-color: #BEBEBE">
		<th>
			Mã: 
		</th>
		<th>
			Tên nhân viên:
		</th>
		<th>
			Email nhân viên:
		</th>
		<th>
			Mật khẩu:
		</th>
		<th>
			
		</th>
		<th>
			
		</th>

	</tr>
	<?php foreach ($ketqua as $each ) { ?>

		<tr>
			<th>
				<?php echo $each['ma']; ?>
			</th>
			<th>
				<?php echo $each['ten']; ?>
			</th>
			
			<th>
				<?php echo $each['email']; ?>
			</th>
			<th>
				<?php echo $each['mat_khau']; ?>
			</th>
			
			<th>
				<a href="sua.php?id=<?php echo $each['ma'] ?>">Sửa</a>
			</th>
			<th>
				<a href="xoa.php?id=<?php echo $each['ma'] ?>">Xóa</a>
			</th>

		</tr>
	<?php } ?> 

</table>
</body>
</html>