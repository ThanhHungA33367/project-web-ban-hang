<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body>
	Quản lý sản phẩm
	<a href="nhap.php">
		Thêm vào sản phẩm
	</a>
	<?php 
	require'../connect.php';
	 $sql = 'select san_pham .* ,nha_san_xuat.ten as nsxten from san_pham join nha_san_xuat on san_pham.nha_san_xuat_id = nha_san_xuat.ma order by san_pham.id';
	
	$ketqua = mysqli_query($ket_noi,$sql);
	$id_be_nhat = [];
	$index = 0;
	 ?>
	<table border="1" width="100%">
		<tr>
			<th>
				Mã 
			</th>
			<th>
				Tên
			</th>
			<th>
				Ảnh
			</th>
			<th>
				Giá
			</th>
			<th>
				Mô tả 
			</th>
			<th>
				Tên nhà sản xuất
			</th>
			<th>
				Sửa
			</th>
			<th>
				Xóa
			</th>

		</tr>
		<?php foreach ($ketqua as $each ) { ?>

			<tr>
				<th>
					<?php echo $each['id']; ?>
				</th>
				<th>
					<?php echo $each['ten']; ?>
				</th>
				<th>
					<img height="100" src="anh/<?php echo $each['anh'] ?> " >
				</th>
				<th>
					<?php echo $each['gia']; ?>
				</th>
				<th>
					<?php echo $each['mo_ta']; ?>
				</th>
				<th>
					<?php echo $each['nsxten']; ?>
				</th>
				<th>
					<a href="sua.php?id=<?php echo $each['id'] ?>">Sửa</a>
				</th>
				<th>
					<a href="xoa.php?id=<?php echo $each['id'] ?>">Xóa</a>
				</th>
				
			</tr>
		<?php } ?> 
		
	</table>
</body>
</html>