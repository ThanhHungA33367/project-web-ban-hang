<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <form action="" method=POST>
	Hôm nay:
    <input type="date"  name="ngay">
    Tháng:
    <input type="month" name="thang">
    Năm:
    <select name="nam" value ='1970'>
        <option>Năm</option>
    <?php for ($i=date('Y'); $i >= 1970 ; $i--) { ?>
    		<option ><?php echo $i ?></option>
    <?php } ?>
    </select>
    <button>hiển thị</button>
    </form>

<table border="1" width="100%">
     <tr>
                    <td>
                        <h1>STT:</h1>
                    </td>
                    <td>
                        <h1>Tên người nhận:</h1>
                    </td>
                    <td>
                        <h1>SĐT người nhận:</h1>
                    </td>
                    <td>
                        <h1>Địa chỉ người nhận:</h1>
                    </td>
                    <td>
                        <h1>Thời gian đặt:</h1>
                    </td>
                    <td>
                        <h1>Trạng thái:</h1>
                    </td>
                    <td>
                        <h1>Tổng tiền:</h1>
                    </td>
                </tr>
   
    <?php 
        if(isset($_POST['ngay']) || isset($_POST['thang']) || isset($_POST['nam'])){ 
        $stt = 0;
        $ngay = date('d/m/Y',strtotime($_POST['ngay']) );
        $thang = date('m/Y',strtotime($_POST['thang']) );
        $nam = $_POST['nam'];
        require'../connect.php';
        $sql = "select * from hoa_don
        where thoi_gian_dat like'%$ngay%' or thoi_gian_dat like'%$thang%' or thoi_gian_dat like'%$nam%'";
        $ket_qua = mysqli_query($ket_noi,$sql);

        foreach ($ket_qua as $each)  { ?>   
               <tr>
                    <td>
                       <?php 
                       $stt++;
                       echo $stt; 
                       ?>
                   </td>
                   <td>
                       <?php echo $each['ten_nguoi_nhan']; ?>
                   </td>
                   <td>
                       <?php echo $each['sdt_nguoi_nhan']; ?>
                   </td>
                   <td>
                       <?php echo $each['dia_chi_nguoi_nhan']; ?>
                   </td>
                     <td>
                       <?php echo $each['thoi_gian_dat']; ?>
                   </td>
                   <td>
                        <?php if($each['trang_thai'] == 1){
                            echo "Đã hoàn thành";
                        }
                        else {
                            echo "Mới đặt";
                        } ?>
                       
                   </td>
                   <td>
                       <?php echo $each['tong_tien']; ?>
                   </td>
               </tr>
    <?php } ?>
    <?php } ?>
    </table>
</body>
</html>