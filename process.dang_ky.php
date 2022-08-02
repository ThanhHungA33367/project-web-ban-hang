<?php 
	require'admin/connect.php';
	$ten = $_POST['ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$email = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	$sdt = $_POST['sdt'];
	$dia_chi = $_POST['dia_chi'];


	$sql = "select count(*) from khach_hang
	where email = '$email'";
	$ket_qua = mysqli_query($ket_noi,$sql);
	$number_rows = mysqli_fetch_array($ket_qua)['count(*)'];
	
	if($number_rows == 1){
	 	header('location:dang_ky.php?loi=Trùng email rồi');
		exit();
	 }
	else{
		$sql = "insert into khach_hang(ten,email,mat_khau,gioi_tinh,ngay_sinh,sdt,dia_chi)
		values ('$ten','$email','$mat_khau','$gioi_tinh','$ngay_sinh','$sdt','$dia_chi')";
		header('location:dang_ky.php?thanh_cong=Đăng ký thành công');
	}
	


	

	
	mysqli_query($ket_noi,$sql);

 ?>