<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$id = $_GET['id'];
	require'../connect.php';
	$sql = "select * from admin where ma = $id";
	$ketqua = mysqli_query($ket_noi,$sql);
	$mang = mysqli_fetch_array($ketqua);

	?>

	<form action="process_update.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $mang['ma'] ?>">
		Tên: <input type="text" name="ten" value="<?php echo $mang['ten'] ?>">
		<br>


		Email: <input type="email" name="email" value="<?php echo $mang['email'] ?>">
		<br>
		Mật khẩu: <input type="text" name="mat_khau" value="<?php echo $mang['mat_khau'] ?>">
		<br>

		<button>Sửa</button>

	</form>
</body>
</html>