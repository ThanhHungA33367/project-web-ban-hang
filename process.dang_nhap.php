<?php 
session_start();
require'admin/connect.php';
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
if(isset($_POST['ghi_nho'])){
	$ghi_nho = true;
}
else{
	$ghi_nho = false;
}

$sql = "select * from khach_hang
where email = '$email' and mat_khau = '$mat_khau' ";
$ket_qua = mysqli_query($ket_noi,$sql);
$number_rows = mysqli_num_rows($ket_qua);

 if($number_rows == 1){
	// session_start();
	$each = mysqli_fetch_array($ket_qua);
	$_SESSION['ma'] = $each['ma'];
 	$_SESSION['ten'] = $each['ten'];
 	

	
 	
}
else{
		$_SESSION['success'] = 1;
		header('location:dang_nhap.php');
	
}
	?>	
	



 
