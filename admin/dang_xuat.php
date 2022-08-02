<?php  

session_start();
unset($_SESSION['level']);
header('location:index.php?thanh_cong=Đăng xuất thành công');