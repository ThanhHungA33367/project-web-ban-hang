<?php require '../check_super_admin.php';

$id = $_POST['id'];
$ten = $_POST['ten'];
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];

require '../connect.php';
$sql ="update admin
set 
ten = '$ten',
email = '$email',
mat_khau = '$mat_khau'
where 
ma = '$id'";
if(isset($_POST['ten']) && isset($_POST['email']) && isset($_POST['mat_khau'])){
	header('location:index.php?thanh_cong=Sửa thành công');
}


mysqli_query($ket_noi,$sql);
mysqli_close($ket_noi);
?>