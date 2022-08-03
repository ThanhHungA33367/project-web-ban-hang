
<?php 
require '../check_super_admin.php';
$ten = $_POST['ten'];	
$dia_chi = $_POST['dia_chi'];
$sdt = $_POST['sdt'];
$anh = $_POST['anh'];
require'../connect.php';

if(empty($_POST['ma'])){
	header('location:index.php?loi=Phải truyền mã');
	exit;
}
$ma = $_POST['ma'];
if(empty($_POST['ten']) || empty($_POST['dia_chi']) || empty($_POST['sdt']) || empty($_POST['anh'])){
	header("location:sua.php?ma=$ma&loi=Phải điền đầy đủ thông tin");
	exit;
}


$sql = "update nha_san_xuat

ten = '$ten',
dia_chi = '$dia_chi',
sdt = '$sdt',
anh = '$anh'
where ma = $ma";



mysqli_query($ket_noi,$sql);
$error = mysqli_error($ket_noi);
mysqli_close($ket_noi);
if(empty($error)){
	header('location:index.php?thanh_cong=Sửa thành công');
	exit;
}
else{
	header("location:sua.php?ma=$ma&loi=Sai truy vấn");
}



?>