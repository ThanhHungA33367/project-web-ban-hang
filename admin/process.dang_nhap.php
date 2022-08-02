<?php 
session_start();
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];

include'connect.php';
$sql = "select * from admin
where email = '$email' AND mat_khau = '$mat_khau' ";
$ket_qua = mysqli_query($ket_noi,$sql);
$each = mysqli_fetch_array($ket_qua);
if(mysqli_num_rows($ket_qua) == 1){
	$_SESSION['ma_admin'] = $each['ma'];
	$_SESSION['ten_admin'] = $each['ten'];
	$_SESSION['level'] = $each['level'];
	header('location:root/index.php');
	exit;
}
else{
	header('location:index.php?loi=Sai mật khẩu hoặc tài khoản');
}
