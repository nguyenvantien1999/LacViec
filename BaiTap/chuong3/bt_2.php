<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh chu vi diện tích hình tròn</title>
</head>
<body>
    <?php 
    define('PI', '3.14');
    if(isset($_POST['bankinh']))  
        $bankinh=trim($_POST['bankinh']); 
    else $bankinh=0;
    if(isset($_POST['tinh'])){
            if (is_numeric($bankinh) && $bankinh > 0) { 
                $dientich= pow($bankinh, 2) * PI;
                $chuvi = 2 * $bankinh * PI;
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $dientich="";
                $chuvi="";
            }
    }
    else {
        $dientich=0;
        $chuvi=0;
    }
    ?>
    <form action="" method="post">
        <table border="0" style="margin: 0 auto;">
            <tr bgcolor="yellow">
                <th colspan="2" align="center"><h3><font color="red">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</font></h3></th>
            </tr>
            <tr>
                <td class="pt-3">Bán kính:</td>
                <td class="pt-3">
                    <input class="form-control" type="text" name="bankinh" value="<?php  echo $bankinh;?>"/>
                </td>
            </tr>
            <tr>
                <td>Chu vi:</td>
                <td>
                    <input class="form-control" type="text" name="chuvi" disabled="disabled" 
                        value="<?php echo $chuvi;?>"/>
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input class="form-control" type="text" name="dientich" disabled="disabled" value="<?php  echo $dientich;?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="btn btn-success" type="submit" value="Tính" name="tinh" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

