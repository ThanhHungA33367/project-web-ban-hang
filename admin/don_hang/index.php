<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table border="1" width="100%">
		<tr>
			<th>Mã</th>
			<th>Thời gian đặt</th>
			<th>Thông tin người nhận</th>
			<th>Thông tin người đặt</th>
			<th>Trạng thái</th>
			<th>Tổng tiền</th>
			<th>Xem</th>
			<th>Sửa</th>
		</tr>
		<?php 
		include '../connect.php';
		$sql = 'select hoa_don.*, khach_hang.ten as ten_khach_hang from hoa_don join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma';
		$ket_qua = mysqli_query($ket_noi,$sql);

		foreach ($ket_qua as $each) {?>
			<tr>
				<td>
					<?php echo $each['ma']; ?>
				</td>
				<td>
					<?php echo $each['thoi_gian_dat']; ?>
				</td>
				<td>
					<?php echo $each['ten_nguoi_nhan']; ?>
				</td>
				<td>
					<?php echo $each['ten_khach_hang']; ?>
				</td>
				<td>
					<?php if($each['trang_thai'] == 0)
					{
						echo 'Mới đặt';
					} 
					else if($each['trang_thai'] == 1){
						echo "Đã duyệt";
					}
					?>
				</td>
				<td>
					<?php echo '$'.$each['tong_tien']; ?>
				</td>
				<td>
					<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>">Xem chi tiết</a>
				</td>
				<td>
					<?php if($each['trang_thai'] == 0) {?>
						<a href="duyet_don.php?ma=<?php echo $each['ma'] ?>&type=duyet" >Duyệt</a> 
						<a href="duyet_don.php?ma=<?php echo $each['ma'] ?>&type=huy">Hủy</a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>