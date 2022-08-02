<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<?php
	require 'admin/connect.php';
	$ma = $_GET['ma'];
	$sql = "select san_pham .* ,nha_san_xuat.ten as nsxten from san_pham join nha_san_xuat on san_pham.nha_san_xuat_id = nha_san_xuat.ma
	where id = '$ma' ";

	$ket_qua = mysqli_query($ket_noi, $sql);
	foreach ($ket_qua as $each) {;
	}
	?> <?php { ?>

		<h1>
			Tên sản phẩm : <?php echo $each['ten'] ?>

		</h1>
		<h1>
			Giá : <?php echo $each['gia'] ?>

		</h1>
		<h1>
			Mô tả : <?php echo $each['mo_ta'] ?>

		</h1>
		<h1>
			Nhà sản xuất : <?php echo $each['nsxten'] ?>

		</h1>

		<img src="admin/san_pham/anh/<?php echo $each['anh'] ?> " height="440px">
	<?php } ?>

</body>

</html>