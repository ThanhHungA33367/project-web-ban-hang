<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php

if (!isset($_SESSION['ma'])) {
	header('location:index.php');
}

$gio = $_SESSION['gio'];
$id1 = $_SESSION['ma'];
$ma_gio_hang = $_GET['ma'];
$tong_tien = 0;
$tong_tien_tung_san_pham = 0;
require 'admin/connect.php';
$sql = "select * from khach_hang
	where ma = '$id1'";
$ket_qua = mysqli_query($ket_noi, $sql);
$mang = mysqli_fetch_array($ket_qua);
?>
	<table border="1" width="100%">
		<tr>
			<th>Ảnh</th>
			<th>Tên</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
			<th>Mô tả</th>
			<th>Nhà sản xuất </th>

		</tr>
		<a href="index.php"> Quay lại trang chủ</a>
		<?php
if (!isset($_SESSION['gio'][$id1])) {
	echo "CHƯA CÓ SẢN PHẨM TRONG GIỎ";
} else {
	foreach ($gio[$id1] as $ma => $each) {?>
			<tr>
				<td>
					<img height="100" src="admin/san_pham/anh/<?php echo $each['anh'] ?> ">
				</td>
				<td>
					<?php echo $each['ten'] ?>

				</td>

				<td>
					<?php echo $each['gia'] ?>
				</td>
				<td>
					<a href="thay_doi_san_pham.php?ma=<?php echo $ma ?>&type=giam " >-</a>
					<?php echo $each['so_luong'] ?>
					<a href="thay_doi_san_pham.php?ma=<?php echo $ma ?>&type=tang " >+</a>
				</td>
				<td>

					<?php $tong_tien_tung_san_pham = $each['gia'] * $each['so_luong'];?>
					<?php echo "$" . $tong_tien_tung_san_pham; ?>
					<?php $tong_tien = $tong_tien + $tong_tien_tung_san_pham;?>


				</td>
				<td>
					<?php echo $each['mo_ta'] ?>
				</td>

				<td>
					<?php echo $each['nha_san_xuat'] ?>
				</td>
			</tr>
		<?php }?>
		<?php }?>

	</table>
	<?php echo "Tổng tiền hóa đơn là: " . "$" . $tong_tien; ?>
	<form action="hoa_don.php" method="POST">
		Tên người nhận: <input type="text" name="ten_nguoi_nhan" value="<?php echo $mang['ten'] ?>">
		<br>
		SĐT người nhận: <input type="number" name="sdt_nguoi_nhan" value="<?php echo $mang['sdt'] ?>">
		<br>
		Địa chỉ người nhận: <input type="text" name="dia_chi_nguoi_nhan" value="<?php echo $mang['dia_chi'] ?>">
		<br>
		<button>
			Đặt hàng
		</button>
	</form>

</body>
</html>