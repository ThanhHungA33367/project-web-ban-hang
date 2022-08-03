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
        height: 400px;
        width: 400px;
        margin-top: 350px;
        margin-left: 900px;
        background: white;
        border-radius: 10px;
        
        /*border-color: coral;*/
    }
    input[type=email] {
        border: 2px solid grey;
        border-radius: 6px;
        height: 50px;
        width: 300px;
        margin: 5px;

    }
    input[type=password] {
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
    margin-top: 50px;
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
    <div id="form">
        <br>
        <h1 align="center">User Login</h1>
        <form method="POST" action="process.dang_nhap.php">
            <i class="fa fa-envelope icon"></i>
            <input type="email" name="email" placeholder="Email">
            <br>
            <i class="fa fa-key icon"></i>
            <input type="password" name="mat_khau" placeholder=" Mật khẩu">
            <br>
            <div id="nut_dang_nhap">
                <button > ĐĂNG NHẬP </button>
            </div>
            
        </form>
    </div>

    <?php include'admin/connect.php' ;
    session_start();
    if(isset($_SESSION['success'])){
      echo "loi mat khau va tai khoan";
      unset($_SESSION['success']);
  }
  if(isset($_SESSION['ma'])){
     header('location:index.php');
     
 }
 ?>
</body>
	<!-- <div id="form">
        <br>
        <h1 align="center">User Login</h1>
        <form method="POST" action="process.dang_nhap.php">
        <i class="fa fa-envelope icon"></i>
         <input type="email" name="email" placeholder="Email">
        <br>
        <i class="fa fa-key icon"></i>
        <input type="password" name="mat_khau" placeholder=" Mật khẩu">
        <br>
       <div id="nut_dang_nhap">
            <button > ĐĂNG NHẬP </button>
       </div>
       
        </form>
    </div>
	
</body> 
</html>