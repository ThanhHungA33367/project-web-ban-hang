<?php
session_start();
if (empty($_SESSION['level'])) {
    header('location:../index.php?loi=Chỉ có super admin mới được vào');
}
