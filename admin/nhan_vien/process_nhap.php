<?php 
require '../check_super_admin.php';
require '../connect.php';

$ten = $_POST['ten'];
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];

if(empty($ten = $_POST['ten']) || empty($email = $_POST['email'])||empty($mat_khau = $_POST['mat_khau'])){
	header('location:nhap.php?loi=Vui lòng điền đầy đủ thông tin');
	exit;
}
else{
	header('location:index.php?thanh_cong=Thêm thành công');
}


require '../connect.php';
$sql ="insert into admin(ten,email,mat_khau,level) 
values('$ten','$email','$mat_khau',0)";


mysqli_query($ket_noi,$sql);
mysqli_close($ket_noi);
?>