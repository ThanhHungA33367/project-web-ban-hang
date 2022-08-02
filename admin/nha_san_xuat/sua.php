<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$ma = $_GET['ma']; 
	
	require'../connect.php';
	$sql = "select * from nha_san_xuat
	where ma = $ma";
	$ketqua = mysqli_query($ket_noi,$sql);
	$mang = mysqli_fetch_array($ketqua)

	?>

	 <form action="process_update.php" method="POST">
	 <input type="hidden" name="ma" value="<?php echo $mang['ma'] ?>">
	Tên: <input type="text" name="ten" value="<?php echo $mang['ten'] ?>">
	<Br>
	Địa chỉ: <textarea name="dia_chi" > <?php echo $mang['dia_chi'] ?> </textarea>
	<Br>
	SĐT: <input type="number" name="sdt" value="<?php echo $mang['sdt'] ?>">
	<Br>
	Ảnh: <input type="text" name="anh" value="<?php echo $mang['anh'] ?>">
	<Br>

	<button>
		Sửa
	</button>
	</form>
</body>
</html>