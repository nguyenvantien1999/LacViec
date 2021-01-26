<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php 
        function thaythe($arr,$ctt, $tt){
            $mang = array();
            for($i=0;$i<count($arr);$i++){
                if($arr[$i]==$ctt){
                    $arr[$i] = $tt; 
                }
            }
            for($i=0;$i<count($arr);$i++){
                $mang[$i] = $arr[$i];
            }
            return $mang;
        }

        $str="";
        $ctt =0;
        $tt =0;
        $so = "";
        $str_kq="";
        $mc = "";
        $mtt = "";
        $ketqua="";

        if(isset($_POST['so'])){
            $so=$_POST['so'];
        }

        if(isset($_POST['ctt'])){
            $ctt=$_POST['ctt'];
        }

        if(isset($_POST['tt'])){
            $tt=$_POST['tt'];
        }

        if(isset($_POST['so']) && isset($_POST['tinh'])){
            $str=$_POST['so'];
            $arr=explode(",",$str);
            $str_kq=implode(",",$arr);
            $a=thaythe($arr,$ctt, $tt);
            for($j=0; $j<count($arr);$j++)
            {
                $mc .= " ".$arr[$j]." "; 
            }
            for($i=0;$i<count($a);$i++)
            {
                $mtt .= " ".$a[$i]." "; 
            }
        }

    ?>

    <form align='center' action="" method="post">
        <table border="0" style="width:500px; margin: 0 auto;">           
            <tr bgcolor="#ff1a8c">
                <th colspan="3" align="center"><h3><font color="white">THAY THẾ</font></h3></th>
            </tr>
            <tr bgcolor="#ffe6f2">
                <td style="text-align: left;">Nhập các phần từ: </td>
                <td>
                    <input type="text" class="form-control"  name="so" value="<?php  echo $so;?>"/>
                </td>              
            </tr>
            <tr bgcolor="#ffe6f2">
                <td style="text-align: left;">Giá trị cần thay thế: </td>
                <td><input type="text" class="form-control"  name="ctt" value="<?php  echo $ctt;?>"/></td>
            </tr>
            <tr bgcolor="#ffe6f2">
                <td style="text-align: left;">Giá trị thay thế: </td>
                <td><input type="text" class="form-control"  name="tt" value="<?php  echo $tt;?>"/></td>
            </tr>
            <tr bgcolor="#ffe6f2">
                <td colspan="3"><button class="btn btn-success" type="submit" name="tinh"> thay thế</button></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mãng cũ </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="mc" value="<?php  echo $mc;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mãng sau khi thay thế </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="mtt" value="<?php  echo $mtt;?>"/></td>
            </tr>
            <tr>
                <td colspan="2">(<span style="color: red"><b>Ghi chú: </b></span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>