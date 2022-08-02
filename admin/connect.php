<?php
$ket_noi = mysqli_connect('localhost', 'root', '', 'hungdeptrai');
mysqli_set_charset($ket_noi, 'utf8');

if (isset($_GET['loi'])) {?>
	<span style="color: red;">
		<?php echo $_GET['loi'] ?>
	</span>
<?php }?>

<?php
if (isset($_GET['thanh_cong'])) {?>
	<span style="color: green;">
		<?php echo $_GET['thanh_cong'] ?>
	</span>
<?php }?>