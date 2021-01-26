<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php 
        function tong($arr){
            $tong = 0;
            for($i=0;$i<count($arr);$i++){
                $tong += $arr[$i];
            }
            return $tong;
        }
        function maxx($arr){
            $max =0 ;
            if(count($arr)!=0)
            { 
                $max = $arr[0];
                for($i=1;$i<count($arr);$i++){

                    if($arr[$i]>$max)
                    {
                        $max = $arr[$i];
                    }
                }
            }   
            return $max;
        }
        function minn($arr){
            $min = 0;
            if(count($arr)!=0)
            {    
                $min = $arr[0];
                for($i=1;$i<count($arr);$i++){
                    if($arr[$i]<$min)
                    {
                        $min = $arr[$i];
                    }
                }
            }
            return $min;
        }
        $mang = "";
        $so =0;
        $arr=array();
        $max =0;
        $min = 0;
        $str_kq="";
        $tong="";

        if(isset($_POST['so'])){
            $so=$_POST['so'];
        }

        if(isset($_POST['tinh'])){
            if(is_numeric($so))
            {
                for($i=0; $i < $so; $i++ )
                {
                    $arr[$i] = rand(0, 20);  
                }
                for($i=0; $i < $so; $i++ )
                {
                    $mang .= " ".$arr[$i]." " ;
                }
                $min= minn($arr);
                $max = maxx($arr);
                $tong=tong($arr);
            }  
        }
    ?>

    <form align='center' action="" method="post">
        <table border="0" style="width:500px; margin: 0 auto;">           
            <tr bgcolor=" #ff3399">
                <th colspan="3" align="center"><h3><font color="white">PHÁT SINH MẢNG VÀ TÍNH TOÁN</font></h3></th>
            </tr>
            <tr bgcolor=" #ffe6f2">
                <td style="text-align: left;">Nhập số phần tử: </td>
                <td>
                    <input type="text" class="form-control"  name="so" value="<?php  echo $so;?>"/>
                </td>              
            </tr>
            <tr bgcolor=" #ffe6f2">
                <td></td>
                <td><button type="submit" class="btn btn-success" name="tinh"> Phát sinh mảng và tính toán</button></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mảng: </td>
                <td colspan="2"><input type="text" class="form-control"  disabled="disabled" name="mang" value="<?php  echo $mang;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">GTLN (MAX) trog mảng: </td>
                <td ><input type="text" class="form-control"  disabled="disabled" name="max" value="<?php  echo $max;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">GTNN (MIN) trog mảng: </td>
                <td ><input type="text" class="form-control"  disabled="disabled" name="min" value="<?php  echo $min;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Tổng mảng: </td>
                <td ><input type="text" class="form-control"  disabled="disabled" name="tong" value="<?php  echo $tong;?>"/></td>
            </tr>
            <tr>
                <td colspan="2">(<span style="color: red"><b>Ghi chú: </b></span>Các phần tử trong mảng sẽ có giá trị trừ 0 đến 20)</td>
            </tr>
        </table>
    </form>
</body>
</html>