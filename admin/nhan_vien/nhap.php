<?php require '../check_super_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	<form action="process_nhap.php" method="POST" e>
		Tên: <input type="text" name="ten">
		<br>
		Email: <input type="email" name="email">
		<br>
		Mật khẩu: <input type="password" name="mat_khau">
		<br>
		<button>Thêm nhân viên</button>
	</form>
</body>
</html>