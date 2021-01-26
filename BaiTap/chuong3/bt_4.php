<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css" media="screen">
        tr td{
            padding-right: 20px;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <?php 
        $toan = 0;
        $ly =0;
        $hoa =0;
        $diemchuan =20;
        $tong =0;
        $ketqua = "";
        if(isset($_POST['toan']))  
            $toan=trim($_POST['toan']); 
        else $toan="";

        if(isset($_POST['ly']))  
            $ly=trim($_POST['ly']); 
        else $ly="";

        if(isset($_POST['hoa']))  
            $hoa=trim($_POST['hoa']); 
        else $hoa="";

        if(isset($_POST['diemchuan']))  
            $diemchuan=trim($_POST['diemchuan']); 
        else $diemchuan="";

        if(isset($_POST['tinh']))
            if (is_numeric($toan)&& is_numeric($ly)&&is_numeric($hoa)&& ($toan) <=10 && ($ly) <=10 && ($hoa) <=10 && ($toan) >=0 && ($ly) >0 && ($hoa) >0 )  
            {
                $tong=$toan + $ly + $hoa;
                if($tong >= $diemchuan)
                {
                    $ketqua = "Đậu";
                }else
                {
                    $ketqua = "Rớt";
                }
            }
            else {              
                    echo "<font color='red'>Vui lòng nhập vào số! và bé hơn hoặc bằng 10  và lớn hơn hoặc bằng 0</font>"; 
                    $pay =0;
                }     
        else{ 
            $toan = 0;
            $ly =0;
            $hoa =0;
            $diemchuan =20;
            $tong =0;
            $ketqua = "";
        }
    ?>
    <form action="" method="post">
        <table style="margin: 0 auto;" border="0" bgcolor="pink">
            <tr bgcolor="#ff0080">
                <th colspan="2" align="center"><h3><font color="white">KẾT QUẢ THI ĐẠI HỌC</font></h3></th>
            </tr>
            <tr>
                <td style="text-align: left;">Điểm toán:</td>
                <td><input type="text" class="form-control"  name="toan" value="<?php echo $toan;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Điểm lý: </td>
                <td><input type="text"   class="form-control"  name="ly" value="<?php echo $ly;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Điểm hóa:</td>
                <td><input type="text" class="form-control"  name="hoa" value="<?php echo $hoa;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Điểm chuẩn:</td>
                <td>
                    <input type="text" class="form-control"  name="diemchuan" value="<?php echo $diemchuan;?>"/>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">Điểm tổng:</td>
                <td><input type="text" class="form-control" disabled="disabled" name="tong" value="<?php echo $tong;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">kết quả:</td>
                <td><input type="text" class="form-control" disabled="disabled" name="ketqua" value="<?php  echo $ketqua;?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn btn-success" value="Xem kết quả" name="tinh" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
