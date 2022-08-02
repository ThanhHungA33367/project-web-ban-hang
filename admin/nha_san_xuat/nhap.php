<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	// $ten = $_POST['ten'];	
	// $dia_chi = $_POST['dia_chi'];
	// $sdt = $_POST['sdt'];
	// $anh = $_POST['anh'];
	require'../connect.php';
	?>
	<form action="process.php" method="POST">
		Tên: <input type="text" name="ten" value="">
		<Br>
		Địa chỉ: <textarea name="dia_chi">  </textarea>
		<Br>
		SĐT: <input type="number" name="sdt">
		<Br>
		Ảnh: <input type="text" name="anh">
		<Br>
		<button>
			Thêm
		</button>
	</form>
</body>
</html>