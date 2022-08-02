
<?php 
require'../connect.php';
require '../check_admin.php';
$ma = $_GET['ma'];
$type = $_GET['type'];
if($type === 'duyet'){
	$sql = "update hoa_don
	set trang_thai = 1
	where ma = '$ma' ";
	$ket_qua = mysqli_query($ket_noi,$sql);
	
}
if($type === 'huy'){
	$sql = "delete from hoa_don_chi_tiet where ma_hoa_don = '$ma'";
	$ket_qua = mysqli_query($ket_noi,$sql);
	$sql = "delete from hoa_don where ma= '$ma'";
	$ket_qua = mysqli_query($ket_noi,$sql);
	
}
