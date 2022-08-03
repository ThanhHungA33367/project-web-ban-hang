<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">

	*{
		padding: 0px;
		margin: 0px;
		font-family: 'Roboto', sans-serif;
	}
	#div_tong{
		width: 100%;
		height: 2100px;
		background-color: red;
		float: left;
	}
	#div_tren{
		width: 100%;
		height: 2%;
		background-color: black;
		float: left;
	}
	#navlist {
		background-color: #0074D9;
		position: absolute;
		width: 100%;
	}
	
	/* styling navlist anchor element */
	#navlist a {
		float:left;
		display: block;
		color: #f2f2f2;
		text-align: center;
		padding: 15px;
		text-decoration: none;
		font-size: 15px;
	}
	#thanh_cong_cu a {
		float:right;
		display: block;
		color: #f2f2f2;
		text-align: center;
		padding: 15px;
		text-decoration: none;
		font-size: 15px;
	}
	.navlist-right{
		float:right;
	}
	
	/* hover effect of navlist anchor element */
	#navlist a:hover {
		background-color: #ddd;
		color: black;
	}
	
	/* styling search bar */
	.search input[type=text]{
		width:400px;
		height:30px;
		border-radius:30px;
		border: none;
		
	}
	
	.search{
		float:center;
		margin:9px;
		position: absolute;
		left: 750px;
	}
	
	.search button{
		background-color: #0074D9;
		color: #f2f2f2;
		float: center;
		padding: 5px 10px;
		margin-right: 16px;
		font-size: 12px;
		border: none;
		cursor: pointer;
	}	

	.row{
		width:  100%;		
		display: flex;
		justify-content: center;
	}
	.row > div {
		width: 70%;
	}

	#div_giua{
		padding-bottom: 6rem;
		width: 70%;
		background-color:  #fff;
	}

	#trang_san_pham a{
		text-decoration: none;

	}	

	#div_giua .tungsanpham{
		width: 30%;
		height: 550px;
		border-radius: 10px;
		float: left;
		text-align: center;
		padding-top: 1rem;
		margin: 10px;
		box-shadow: 1px 0px 2px 0px rgba(0,0,0,0.08);
	}
	.paging{
		padding: 0.5rem;
		padding-top: 0.2rem;
		border:  1px solid #ccc;
		border-radius: 2px;
		margin-right:  5px;
	}
	.tungsanpham img{
		
		height: 350px;
		border-radius: 5px;
		position: relative;
		text-align: center;
	}
	a img:hover{
		transform: scale(1.09,1.09);
		transition: 1s;
		
	}
	

</style>
</head>
<body>
	<div id="div_tong">
		<?php 
		if(isset($_GET['tim_kiem']))
			$tim_kiem = $_GET['tim_kiem'];
		session_start();
		?>
		<div id="div_tren">
			<div id="navlist">
				<a href="index.php">Home</a>
				<a href="iphone_index.php">Iphone</a>
				<a href="#">Macbook</a>
				<a href="#">About Us</a>
				<a href="#">Liên hệ</a>
				<div class="search">
					
					<form action="#">
						<input type="text"
						placeholder=" Search Courses"
						name="tim_kiem">
						<button>
							<i class="fa fa-search"
							style="font-size: 18px;">
						</i>
					</button>
				</form>
			</div>
			<div id="thanh_cong_cu">
				<?php if(!isset($_SESSION['ma'])){ ?>
					
					<a href="dang_ky.php" id="dang_kyabc">Đăng ký</a>
					<a href="dang_nhap.php" id="dang_nhapabc">Đăng nhập</a>
				<?php } ?> 
				<?php if(isset($_SESSION['ma'])){ ?>
					<a href="dang_xuat.php" id="dang_xuatabc">Đăng xuaat</a>
				<?php } ?> 
			</div>
			<img src="">
		</div>
	</div>

	<?php 
	require'admin/connect.php';
	$tim_kiem = "" ;
	if(isset($_GET['tim_kiem'])){
		$tim_kiem = $_GET['tim_kiem'];	
	}
	$trang = 1;
	if(isset($_GET['trang'])){
		$trang = $_GET['trang'];
	}
	$vong_lap = true;
	$sql_so_san_pham = 'select count(*) from san_pham';
	$ket_qua_san_pham = mysqli_query($ket_noi,$sql_so_san_pham);
	$mang_san_pham = mysqli_fetch_array($ket_qua_san_pham);
	$dem_san_pham = $mang_san_pham['count(*)'];

	$so_san_pham_tren_mot_trang = 9;
	$so_trang = ceil($dem_san_pham/ $so_san_pham_tren_mot_trang);
	$bo_qua = $so_san_pham_tren_mot_trang * ($trang - 1);

	$sql = "select * from san_pham 
	where ten like '%Macbook%'
	limit $so_san_pham_tren_mot_trang offset $bo_qua";
	$ket_qua = mysqli_query($ket_noi,$sql);


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
					<a href="chi_tiet_san_pham.php?ma=<?php echo $each['id'] ?>"> <img src="admin/san_pham/anh/<?php echo $each['anh'] ?>"  height = "440"> </a>
					<h2>
						Giá: <?php echo $each['gia']; ?>	
					</h2>
					<?php if(isset($_SESSION['ma'])){ ?>
						<a href="them_vao_gio_hang.php?ma=<?php echo $each['id'] ?>"> <i class="fa fa-shopping-cart" style="font-size:48px;color:red"></i> </a>
					<?php } ?> 
				</div>
			<?php }  ?>
		</div>
	</div>
	<div class="row">
		<div id="trang_san_pham">
			<?php for($i = 1; $i <= $so_trang; $i++) {?>
				<a class="paging" href="?trang=<?php echo $i ?>">
					<?php echo $i; ?>
				</a>
			<?php } ?> 
		</div>
	</div>




</div>
</body>
</html>