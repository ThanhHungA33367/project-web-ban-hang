<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <table border="1" width="100%">
        <tr>
            <td>
                <h1>STT:</h1>
            </td>
            <td>
                <h1>Tên khách hàng:</h1>
            </td>
            <td>
                <h1>Email khách hàng:</h1>
            </td>
            <td>
                <h1>Sđt khách hàng:</h1>
            </td>
            <td>
                <h1>Địa chỉ khách hàng:</h1>
            </td>
            <td>
                <h1>Tổng số chi tiền khách hàng:</h1>
            </td>

        </tr>
        <?php require '../connect.php';
        $sql = 'select khach_hang.* ,sum(tong_tien) as tong_tien_khach_hang from khach_hang join hoa_don on khach_hang.ma = hoa_don.ma_khach_hang group by khach_hang.ma;';

        $ket_qua = mysqli_query($ket_noi, $sql);
        $stt = 0;
        foreach ($ket_qua as $each) { ?>
            <tr>
                <td>
                    <?php $stt++;
                    echo $stt;
                    ?>
                </td>
                <td>
                    <?php echo $each['ten']; ?>
                </td>
                <td>
                    <?php echo $each['sdt']; ?>
                </td>
                <td>
                    <?php echo $each['dia_chi']; ?>
                </td>
                <td>
                    <?php echo $each['ten']; ?>
                </td>
                <td>
                    <?php echo $each['tong_tien_khach_hang']; ?>
                </td>
            </tr>
        <?php } ?>

        <?php echo "khanh ngu" ?>
</body>

</html>