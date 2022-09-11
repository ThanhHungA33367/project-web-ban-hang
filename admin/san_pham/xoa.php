<?php require '../check_admin.php'?>
<?php
$id = $_GET['id'];
require '../connect.php';
$sql = "delete from san_pham where id = '$id'";
mysqli_query($ket_noi, $sql);

mysqli_close($ket_noi);
