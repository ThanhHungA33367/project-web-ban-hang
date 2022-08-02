<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	Đây là giao diện nhà sản xuất
	<a href="nhap.php">
		Thêm vào
	</a>

	<?php 
	include '../menu.php';

	require'../connect.php';
	

	$sql = "select * from nha_san_xuat";
	$ket_qua = mysqli_query($ket_noi,$sql);
	mysqli_close($ket_noi);
	?>
	<table width="100%" border="1">
		<tr>
			<th>
				Mã
			</th>
			<th>
				Tên
			</th>
			<th>
				Địa chỉ
			</th>
			<th>
				SĐT
			</th>
			<th>
				Ảnh
			</th>
		</tr>
		<?php foreach ($ket_qua as $each ) { ?>
			<tr>
				<th>
					<?php echo $each['ma'] ?>
				</th>
				<th>
					<?php echo $each['ten'] ?>
				</th>
				<th>
					<?php echo $each['dia_chi'] ?>
				</th>
				<th>
					<?php echo $each['sdt'] ?>
				</th>
				<th>
					<?php echo $each['anh'] ?>
				</th>
				<th >
					<a href="sua.php?ma=<?php echo $each['ma'] ?>">Sửa</a>
				</th>
				<th>
					<a href="xoa.php?ma=<?php echo $each['ma'] ?>">Xóa</a>
				</th>
			</tr>
		<?php } ?> 
	</table>
</body>
</html>