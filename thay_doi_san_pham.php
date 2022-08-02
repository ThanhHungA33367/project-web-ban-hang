<?php 
session_start();
$ma = $_GET['ma'];
$id = $_SESSION['ma'];
$type = $_GET['type'];
if($type === 'tang'){
	$_SESSION['gio'][$id][$ma]['so_luong']++;
	header("location:gio_hang.php?ma=$id");
}
if($type === 'giam'){
	if($_SESSION['gio'][$id][$ma]['so_luong']>1){
	$_SESSION['gio'][$id][$ma]['so_luong']--;
	header("location:gio_hang.php?ma=$id");
	}
	if($_SESSION['gio'][$id][$ma]['so_luong']===1){
	unset($_SESSION['gio'][$id][$ma]);
	header("location:gio_hang.php?ma=$id");
}
}
?>