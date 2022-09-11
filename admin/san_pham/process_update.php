<?php require '../check_admin.php'?>
<?php
$id = $_POST['id'];
$nha_san_xuat_id = $_POST['nha_san_xuat_id'];
$ten = $_POST['ten'];
$mo_ta = $_POST['mo_ta'];
$gia = $_POST['gia'];
$anh_moi = $_FILES['anh_moi'];
if ($anh_moi['size'] > 0) {
	$folder = 'anh/';
	$file_extension = explode('.', $anh_moi["name"])[1];
	$file_name = time() . '.' . $file_extension;
	$target_file = $folder . $file_name;
	move_uploaded_file($anh_moi["tmp_name"], $target_file);
} else {
	$file_name = $_POST['anh_cu'];
}

require '../connect.php';
$sql = "update san_pham
set
ten = '$ten',
gia = '$gia',
mo_ta = '$mo_ta',
nha_san_xuat_id = '$nha_san_xuat_id',
anh = '$file_name'
where
id = '$id'";
mysqli_query($ket_noi, $sql);
mysqli_close($ket_noi);