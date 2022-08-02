<?php require '../check_super_admin.php' ?>
	<?php 
	$ten = $_POST['ten'];	
	$dia_chi = $_POST['dia_chi'];
	$sdt = $_POST['sdt'];
	$anh = $_POST['anh'];
	require'../connect.php';
	if(empty($_POST['ten']) || empty($_POST['dia_chi']) || empty($_POST['sdt']) || empty($_POST['anh'])){
		header('location:nhap.php?loi=Phải điền đầy đủ thông tin');
		exit;
	}

	else{
		header('location:index.php?thanh_cong=Thêm thành công');
	}
	
	$sql = "insert into nha_san_xuat(ten,dia_chi,sdt,anh)
	values('$ten','$dia_chi','$sdt','$anh')";


	mysqli_query($ket_noi,$sql);
	mysqli_close($ket_noi);


	 ?>
