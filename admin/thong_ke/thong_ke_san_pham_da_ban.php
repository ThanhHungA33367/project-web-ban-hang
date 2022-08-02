<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Roboto';
			font-size: 14px;
		}
	</style>
</head>

<body>
	<?php
	$stt = 0;
	require '../connect.php';
	$sql = 'select san_pham.id, san_pham.ten, ifnull(sum(so_luong),0) as so_luong_san_pham_da_ban_ra from san_pham left join hoa_don_chi_tiet on san_pham.id = hoa_don_chi_tiet.ma_san_pham left join hoa_don on san_pham.id = hoa_don.ma where trang_thai = 1 or trang_thai is null group by san_pham.id order by so_luong_san_pham_da_ban_ra desc;';
	$ket_qua = mysqli_query($ket_noi, $sql);

	?>
	<table border="1" width="100%">
		<tr>
			<td width="10%">
				<h1>STT:</h1>
			</td>
			<td width="10%">
				<h1>Id sản phẩm:</h1>
			</td>
			<td width="50%">
				<h1>Tên sản phẩm:</h1>
			</td>
			<td width="20%">
				<h1>Số lượng bán ra: (sản phẩm)</h1>
			</td>

		</tr>
		<?php foreach ($ket_qua as $each) { ?>
			<tr>
				<td>
					<?php $stt++;
					echo $stt;
					?>
				</td>
				<td>
					<?php echo $each['id']; ?>
				</td>
				<td>
					<?php echo $each['ten']; ?>
				</td>
				<td>
					<?php echo $each['so_luong_san_pham_da_ban_ra'] ?>
				</td>

			</tr>

		<?php } ?>

	</table>

</body>

</html>