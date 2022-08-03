<?php 
session_start();
if(isset($_GET['tim_kiem']))
$tim_kiem = $_GET['tim_kiem'];
 ?>
	<div id="div_tren">

    <div id="navlist">
        <a href="index.php">Home</a>
        <a href="iphone_index.php">Iphone</a>
        <a href="macbook_index.php">Macbook</a>
        <a href="#">About Us</a>
        <a href="#">Liên hệ</a>
        
        <div class="search">
            <form action="#">
                <input type="text"
                    placeholder=" Tìm kiếm sản phẩm"
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
                    <a href="gio_hang.php?ma=<?php echo $ma ?>">Gio hang</a>
        			<a href="dang_xuat.php" id="dang_xuatabc">Đăng xuaat</a>
        		<?php } ?> 
        	</div>

        <img src="">
    </div>
        <div class="banner_ngang">
            <img src="admin/san_pham/anh/1659500708.jpg" style="padding-top: 50px; padding-left: 100px; width: 95%;">
        </div>
	</div>