<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	*{
		font-family: 'Roboto', sans-serif;
	}
	html {
		height: 100%;
		width: 1000px;
		background-image:
		url('https://wallpaperaccess.com/full/3232458.jpg');
	}
	#form{
		height: 650px;
		width: 400px;
		margin-top: 200px;
		margin-left: 800px;
		padding-top: 20px;
		background: white;
		border-radius: 10px;
	}
	input:not([type=radio])  {
		border: 2px solid grey;
		border-radius: 6px;
		height: 50px;
		width: 300px;
		margin: 5px;
	}
	i{
		padding: 10px;
		background: dodgerblue;
		color: white;
		min-width: 30px;
		text-align: center;
		margin-left:5px;
	}
	button{
		background: dodgerblue;
		border-radius: 10px;
		width: 380px;
		height: 40px;
		margin-top: 35px;
		margin-left: 10px;
		color: white;

	}
	h1 {
		font-size: 40px;
		background: -webkit-linear-gradient(#eee, #333);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}

</style>
</head>
<body>
	<?php
	require 'admin/connect.php';
	?>
	<div id="form">
		<h1>Đăng ký tài khoản</h1>
		<form action="process.dang_ky.php" method="POST">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" name="ten" placeholder="Họ và Tên">
			<Br>
			<i class="fa fa-intersex"></i>
			<input type="radio" name="gioi_tinh" value="nam"> Nam
			<input type="radio" name="gioi_tinh" value="nu"> Nữ
			<Br>
			<i class="fa fa-calendar" aria-hidden="true"></i>
			<input type="date" name="ngay_sinh" placeholder="Ngày sinh">
			<Br>
			<i class="fa fa-solid fa-phone"></i>
			<input type="number" name="sdt" placeholder="Số điện thoại">
			<Br>
			<i class="fa fa-address-book"></i>
			<input type="text" name="dia_chi" placeholder="Địa chỉ">
			<Br>
			<i class="fa fa-envelope icon"></i>
			<input type="email" name="email" placeholder="Email">
			<Br>
			<i class="fa fa-key icon"></i>
			<input type="password" name="mat_khau" placeholder="Mật khẩu">
			<Br>
		</form>

		<div id="nut_dang_nhap">
			<button type="submit"> ĐĂNG KÝ </button>
		</div>

	</form>
</div>
</body>
</html>