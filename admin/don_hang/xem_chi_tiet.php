<?php require '../check_admin.php' ?>
<?php  

	$ma = $_GET['ma'];
	$tong_tien = 0;
	$tong_tien_tung_san_pham = 0;
	require'../connect.php';
	$sql = "select san_pham.*, hoa_don_chi_tiet.so_luong as so_luong from san_pham join hoa_don_chi_tiet on san_pham.id = hoa_don_chi_tiet.ma_san_pham 
	where ma_hoa_don = '$ma'";
	$ket_qua = mysqli_query($ket_noi,$sql);

	
	 ?> 
	 <table border="1" width="100%">
	 	<tr>
	 		<th>Ảnh</th>
	 		<th>Tên</th>
	 		<th>Giá</th>
	 		<th>Số lượng</th>
	 		<th>Tổng tiền</th>
	 	</tr>
	  <?php  
	foreach ($ket_qua as $each) { ?> 
		<tr>
			<td>
				<img height="100" src="../san_pham/anh/<?php echo $each['anh'] ?> ">
			</td>
			<td>
				<?php echo $each['ten'] ?>

			</td>
			
			<td>
				<?php echo $each['gia'] ?>
			</td>
			<td>
				<?php echo $each['so_luong'] ?>
			</td>
			<td>
				
				<?php $tong_tien_tung_san_pham = $each['gia']*$each['so_luong']; ?>
				<?php echo "$".$tong_tien_tung_san_pham; ?>
				<?php $tong_tien = $tong_tien + $tong_tien_tung_san_pham; ?>
				 
				
			</td>
			
		</tr>
		
		
	<?php } ?>
		
	</table>
	<?php echo "Tổng tiền hóa đơn là: ". "$".$tong_tien; ?>