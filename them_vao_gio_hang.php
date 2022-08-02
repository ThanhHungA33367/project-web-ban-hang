<?php 
session_start();

$ma = $_GET['ma'];
$id = $_SESSION['ma'];
if(empty($_SESSION['gio'][$id][$ma])){
	require'admin/connect.php';
	$sql = "select san_pham .* ,nha_san_xuat.ten as nsxten from san_pham join nha_san_xuat on san_pham.nha_san_xuat_id = nha_san_xuat.ma 
	where id = '$ma'";
	$ket_qua = mysqli_query($ket_noi,$sql);
	$each = mysqli_fetch_array($ket_qua);
	$_SESSION['gio'][$id][$ma]['ten']= $each['ten'];
	$_SESSION['gio'][$id][$ma]['anh']= $each['anh'];
	$_SESSION['gio'][$id][$ma]['gia']= $each['gia'];
	$_SESSION['gio'][$id][$ma]['mo_ta']= $each['mo_ta'];
	$_SESSION['gio'][$id][$ma]['nha_san_xuat'] = $each['nsxten'];
	$_SESSION['gio'][$id][$ma]['so_luong'] = 1;
}
else{
	$_SESSION['gio'][$id][$ma]['so_luong']++ ;
}

