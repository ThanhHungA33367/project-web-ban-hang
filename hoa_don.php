<?php 
session_start();
$gio = $_SESSION['gio'];
$id = $_SESSION['ma'];
include 'admin/connect.php';
$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
$ma_khach_hang = $_SESSION['ma'];


$trang_thai = 0; //moi dat
date_default_timezone_set('Asia/Ho_Chi_Minh');

$thoi_gian_dat  = date('d/m/Y H:i:s'); //ngay bay gio
$tong_tien = 0;
foreach ($gio[$id] as $ma => $each) {
	$tong_tien_moi_san_pham = $each['gia']*$each['so_luong'];
	$tong_tien += $tong_tien_moi_san_pham;
}


$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,trang_thai,thoi_gian_dat,tong_tien)
values('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan','$trang_thai','$thoi_gian_dat','$tong_tien')"; 
$ket_qua = mysqli_query($ket_noi,$sql);




foreach ($gio[$id] as $ma_san_pham => $each) {
	$sql1= "select max(ma) from hoa_don where ma_khach_hang = '$ma_khach_hang' ";
	$ket_qua1 = mysqli_query($ket_noi,$sql1);
	$mang = mysqli_fetch_array($ket_qua1);
	$ma_hoa_don = $mang['max(ma)'];
	$so_luong = $each['so_luong'];
	$sql = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_san_pham,so_luong)
	values ('$ma_hoa_don', '$ma_san_pham' , '$so_luong')";
	$ket_qua = mysqli_query($ket_noi,$sql);
	
}

?> 