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
	$sql = "delete from nha_san_xuat
	where ma = '$ma'";
	mysqli_query($ket_noi,$sql);
	

	

	?>
</body>
</html>