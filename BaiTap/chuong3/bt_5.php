<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TÍNH TIỀN KARAOKE</title>
    <style type="text/css" media="screen">
        tr td{
            padding-right: 20px;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_POST['start']))  
            $start=trim($_POST['start']); 
        else $start=0;

        if(isset($_POST['end'])) 
            $end=trim($_POST['end']); 
        else $end=0;

        if(isset($_POST['tinh']))
        {
            if (is_numeric($start) && is_numeric($end))
            {  
                if($end>$start)
                {
                    if($end<24||$start>10)
                    {
                        $pay =0;
                        if($start<17 && $end > 17 )
                        {
                            $pay = ( 17 - $start)*20000 + ($end  - 17)*45000;                  
                        }else if($start<17 && $end <= 17)
                        {
                            $pay = ($end - $start)*20000;
          
                        }else if($start>=17 && $end > 17)
                        {
                            $pay = ($end - $start)*45000;
                        }
                    }else
                    {
                        echo "giờ này đã bị nghĩ vui lòng nhập lại";
                    }
                }else{
                    echo "Giờ kết thúc phải > Giờ bắt đầu";
                }      
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $pay=0;
            }
        }
        else $pay=0;
    ?>

    <form align='center' action="" method="post">
        <table border="0" bgcolor="#b3ecff" style="margin: 0 auto;">
            <tr bgcolor="#0099cc">
                <th colspan="3" align="center"><h3><font color="white">TÍNH TIỀN KARAOKE</font></h3></th>
            </tr>
        <tr>
            <td style="text-align: left;">Giờ bắt đầu:</td>
            <td><input type="text" class="form-control"  name="start" value="<?php  echo $start;?>"/></td>
            <td>(h)</td>            
        </tr>
        <tr>
            <td style="text-align: left;">Giờ kết thúc:</td>
            <td><input type="text" class="form-control"  name="end" value="<?php  echo $end;?>"/></td>
            <td>(h)</td>
        </tr>
        <tr>
            <td style="text-align: left;">Tiền thanh toán:</td>
            <td><input type="text" class="form-control"  name="pay" disabled="disabled" value="<?php  echo $pay;?>"/> </td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Tính" name="tinh" /></td>
        </tr>
        </table>
    </form>
</body>
</html>