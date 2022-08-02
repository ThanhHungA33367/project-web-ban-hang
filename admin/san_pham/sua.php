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
	$sql = "select * from san_pham where id = $id";
	$ketqua = mysqli_query($ket_noi,$sql);
	$mang = mysqli_fetch_array($ketqua);

	$sql = "select * from nha_san_xuat";
	$nha_san_xuat = mysqli_query($ket_noi,$sql);
	 ?>

	<form action="process_update.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $mang['id'] ?>">
	Tên: <input type="text" name="ten" value="<?php echo $mang['ten'] ?>">
	<br>
	Ảnh mới : <input type="file" name="anh_moi" >
	<br>
	Hoặc giữ ảnh cũ : <img height="200" src="anh/<?php echo $mang['anh'] ?>">
	<input type="hidden" name="anh_cu" value="<?php echo $mang['anh'] ?>">

	<br>
	Giá: <input type="text" name="gia" value="<?php echo $mang['gia'] ?>">
	<br>
	Mô tả: <textarea name="mo_ta"><?php echo $mang['mo_ta'] ?></textarea >
	<br>
	Nhà sản xuất: <select name="nha_san_xuat_id"  >
	<?php foreach ($nha_san_xuat as $each) : ?>
	 <option value=" <?php echo $each['ma'] ?>" <?php if($mang['nha_san_xuat_id'] == $each['ma'] ){ ?>
	 	selected
	 	<?php } ?>
	 	> 
	 	<?php echo $each['ten'] ?>
	 		
	 	</option>
	 
	 	
	<?php endforeach ?>
	</select>
	<br>
	<button>Sửa</button>
	
	</form>
</body>
</html>