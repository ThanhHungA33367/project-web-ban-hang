<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	require'../connect.php';
	$sql = 'select * from nha_san_xuat';
	$ketqua = mysqli_query($ket_noi,$sql);
	 ?>
	<form action="process.php" method="POST" enctype="multipart/form-data">
	Tên: <input type="text" name="ten">
	<br>
	Ảnh: <input type="file" name="anh">
	<br>
	Giá: <input type="text" name="gia">
	<br>
	Mô tả: <textarea name="mo_ta"></textarea>
	<br>
	Nhà sản xuất: <select name="nha_san_xuat_id" >
	<?php foreach ($ketqua as $each) : ?>
	 <option value=" <?php echo $each['ma'] ?>"> <?php echo $each['ten'] ?></option>

	<?php endforeach ?>
	</select>
	<br>
	<button>Thêm sản phẩm</button>
	
	</form>
</body>
</html>