<?php require '../check_super_admin.php'; 
$id = $_GET['id'];
require '../connect.php';
$sql ="delete from admin where ma = '$id'";
header('location:index.php');
mysqli_query($ket_noi,$sql);
mysqli_close($ket_noi);
?>