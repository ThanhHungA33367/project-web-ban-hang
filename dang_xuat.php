<?php
session_start();
unset($_SESSION['ma']);
unset($_SESSION['ten']);
$_SESSION['dang_xuat'] = 1;
header('location:index.php');
