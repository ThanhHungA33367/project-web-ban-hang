
<?php
require 'admin/connect.php';
$tim_kiem = "";
if (isset($_GET['tim_kiem'])) {
	$tim_kiem = $_GET['tim_kiem'];
}
$trang = 1;
if (isset($_GET['trang'])) {
	$trang = $_GET['trang'];
}
$vong_lap = true;
$sql_so_san_pham = 'select count(*) from san_pham';
$ket_qua_san_pham = mysqli_query($ket_noi, $sql_so_san_pham);
$mang_san_pham = mysqli_fetch_array($ket_qua_san_pham);
$dem_san_pham = $mang_san_pham['count(*)'];

$so_san_pham_tren_mot_trang = 6;
$so_trang = ceil($dem_san_pham / $so_san_pham_tren_mot_trang);
$bo_qua = $so_san_pham_tren_mot_trang * ($trang - 1);

$sql = "select * from san_pham
		where ten like '%$tim_kiem%'
		limit $so_san_pham_tren_mot_trang offset $bo_qua";
$ket_qua = mysqli_query($ket_noi, $sql);

?>
<div>

</div>
<div class="row">
	<div id="div_giua">

		<?php foreach ($ket_qua as $each) {?>
			<div class="tungsanpham">
				<h1>
					<?php echo $each['ten']; ?>
				</h1>

				<Br>
				 <a href="chi_tiet_san_pham.php?ma=<?php echo $each['id'] ?>"> <img src="admin/san_pham/anh/<?php echo $each['anh'] ?>"  height = "440" > </a>
				<h2>
					Giá: <?php echo $each['gia']; ?>
				</h2>
				<?php if (isset($_SESSION['ma'])) {?>
					<a href="them_vao_gio_hang.php?ma=<?php echo $each['id'] ?>" class ='thong_bao' > <i class="fa fa-shopping-cart" style="font-size:48px;color:red"></i> </a>
				<?php }?>
			</div>
		<?php }?>
	</div>
</div>
<div class="row">
	<?php if (!isset($_GET['tim_kiem'])) {?>
	<div id="trang_san_pham">
		 <?php for ($i = 1; $i <= $so_trang; $i++) {?>
	 	<a class="paging" href="?trang=<?php echo $i ?>">
	 		<?php echo $i; ?>
	 	</a>
	 	<?php }?>
	 	<?php }?>
	 </div>
</div>