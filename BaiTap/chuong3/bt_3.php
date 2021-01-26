<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css" media="screen">
        tr td{
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <?php 
        $pi = 3.14;
        $old =0;
        $name ='';
        $new =0;
        $price =2000;
        $pay =0;
        if(isset($_POST['name']))  
            $name=trim($_POST['name']); 
        else $name="";

        if(isset($_POST['old']))  
            $old=trim($_POST['old']); 
        else $name="";

        if(isset($_POST['new']))  
            $new=trim($_POST['new']); 
        else $new="";

        if(isset($_POST['price']))  
            $price=trim($_POST['price']); 
        else $price="";

        if(isset($_POST['tinh']))
            if (is_numeric($old)&& is_numeric($new)&&is_numeric($price) )  
            {
                $pay=($new-$old) * $price;
            }
            else {              
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $pay =0;
            }
        else{ 
            $pi = 3.14;
            $old =0;
            $name ='';
            $new =0;
            $price =2000;
            $pay =0;
        }

    ?>
    <form action="" method="post">
        <table style="margin: 0 auto;" border="0" bgcolor="#ffffcc">
            <tr bgcolor="yellow">
                <th colspan="3" class="text-center"><h3><font color="red">THANH TOÁN TIỀN ĐIỆN</font></h3></th>
            </tr>
            <tr>
                <td style="text-align: left;">Tên chủ hộ:</td>
                <td><input type="text" class="form-control"  name="name" value="<?php echo $name;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Chỉ số cũ: </td>
                <td><input type="number" class="form-control"   name="old" value="<?php echo $old;?>"/></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td style="text-align: left;">Chỉ số mới:</td>
                <td><input type="number" class="form-control"  name="new"  value="<?php echo $new;?>"/></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td style="text-align: left;">Đơn giá:</td>
                <td><input type="number" class="form-control"  name="price"  value="<?php echo $price;?>"/></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td style="text-align: left;">Tiền thanh toán:</td>
                <td><input type="number" class="form-control" disabled="disabled" name="pay"  value="<?php echo $pay;?>"/></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-success" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>
</html>