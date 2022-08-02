<?php require '../check_admin.php' ?>
<?php 

$nha_san_xuat_id = $_POST['nha_san_xuat_id'];
$ten = $_POST['ten'];
$mo_ta = $_POST['mo_ta'];
$gia = $_POST['gia'];
$anh = $_FILES['anh'];

$folder = 'anh/';
$file_extension = explode('.', $anh["name"])[1];
$file_name = time(). '.' .$file_extension;
$target_file = $folder . $file_name ;

move_uploaded_file($anh["tmp_name"], $target_file);
if(empty($ten = $_POST['ten']) || empty($mo_ta = $_POST['mo_ta'])||empty($gia = $_POST['gia'])||$anh['size'] == 0){
	header('location:nhap.php?loi=Vui lòng điền đầy đủ thông tin');
	exit;
}
else{
	header('location:index.php?thanh_cong=Thêm thành công');
}


require '../connect.php';
$sql ="insert into san_pham(ten,mo_ta,gia,anh,nha_san_xuat_id) 
values('$ten','$mo_ta','$gia','$file_name','$nha_san_xuat_id')";





mysqli_query($ket_noi,$sql);
mysqli_close($ket_noi);