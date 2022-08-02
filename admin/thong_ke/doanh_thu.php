<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
	body {
		font-family: 'Roboto';font-size: 22px;
	}	
</style>
</head>
<body>
	<form action="" method=POST>
		Hôm nay:
		<input type="date"  name="ngay">
		Tháng:
		<input type="month" name="thang">
		Năm:
		<select name="nam" >
			<option></option>
			<?php for ($i=date('Y'); $i >= 1970 ; $i--) { ?>
				<option ><?php echo $i ?></option>
			<?php } ?>
		</select>
		<button>hiển thị</button>
	</form>

	<table border="1" width="100%">
		
		
		<?php 
		if(isset($_POST['ngay']) || isset($_POST['thang']) || isset($_POST['nam'])){ ?>
			<tr>
				<td>
					<h1>STT:</h1>
				</td>
				<td>
					<?php 
					if($_POST['ngay'] !== '') {  ?>
						<h1>Doanh thu: <?php  echo date('d/m/Y',strtotime($_POST['ngay']) ); 
						?>
					</h1>

				<?php } ?>
				<?php 
				if($_POST['thang'] !== '') {  ?>
					<h1>Doanh thu: <?php  echo date('m/Y',strtotime($_POST['thang']) ); 
					?>
				</h1>
			<?php } ?>
			<?php 
			
			if($_POST['nam'] !== '') { ?>
				<h1>Doanh thu: <?php echo ($_POST['nam']) ; 
				?>          	
			</h1>
		<?php } ?> 
	</td>
	
</tr>
<?php 
$stt = 0;
$ngay = date('d/m/Y',strtotime($_POST['ngay']) );
$thang = date('m/Y',strtotime($_POST['thang']) );
$nam = $_POST['nam'];
require'../connect.php';
$sql = "select sum(tong_tien) as tong_doanh_thu from hoa_don
where (thoi_gian_dat like'%$ngay%' or thoi_gian_dat like'%$thang%' or thoi_gian_dat like'%$nam%') and (trang_thai = 1);";

$ket_qua = mysqli_query($ket_noi,$sql);

foreach ($ket_qua as $each)  { ?>   
	<tr>
		<td>
			<?php 
			$stt++;
			echo $stt; 
			?>
		</td>
		<td>
			<?php echo $each['tong_doanh_thu']; ?>
		</td>
		
	</tr>
<?php } ?>
<?php } ?>
</table>
</body>
</html>