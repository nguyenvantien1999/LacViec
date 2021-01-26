<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php 
        function ghepmang($mang){
            $arr = array();
            for($i=0;$i<count($mang);$i++){
                $arr[$i] = $mang[$i];           
            }
            return $arr;
        }
        function swap3(&$x, &$y) {
            $tmp=$x;
            $x=$y;
            $y=$tmp;
        }
        function tangdan($mang){          
            for($i=0;$i<count($mang)-1;$i++){
                for($j=$i+1;$j<count($mang);$j++)
                {
                    if($mang[$i]>=$mang[$j])
                    {
                        swap3($mang[$i], $mang[$j]);
                    }
                }
            }
            return $mang;
        }
        function giamdan($mang){
            for($i=0;$i<count($mang)-1;$i++){
                for($j=$i+1;$j<count($mang);$j++)
                {
                    if($mang[$i]<$mang[$j])
                    {
                        swap3($mang[$i], $mang[$j]);
                    }
                }           
            }
            return $mang;
        }

        $manga = "";
        $mangb = "";
        $ptma = 0;
        $ptmb = 0;
        $mangc = "";
        $td = "";
        $gd ="";
        $mc = "";

        if(isset($_POST['manga'])){
            $manga=$_POST['manga'];
        }
        if(isset($_POST['mangb'])){
            $mangb=$_POST['mangb'];
        }
        if(isset($_POST['manga']) && isset($_POST['tinh']) && isset($_POST['mangb'])){
            $ptma=$_POST['manga'];
            $ptmb=$_POST['mangb'];
            $noichuoi = "$ptma, $ptmb";
            $mang=explode(",",$noichuoi);        
            // $str_kq=implode(",",$arr);   
            $mtd=tangdan($mang);
            $mgd=giamdan($mang);
            $mangc=implode(", ",$mang);
            $td=implode(", ",$mtd);
            $gd=implode(", ",$mgd);
        }
    ?>

    <form align='center' action="" method="post">
        <table border="0" style="width:500px; margin: 0 auto;">         
            <tr bgcolor="#990099">
                <th colspan="3" align="center"><h3><font color="white">Đếm phần tử, ghép mảng và sắp xếp</font></h3></th>
            </tr>
            <tr bgcolor="#ffccff">
                <td style="text-align: left;">Mảng A: </td>
                <td><input type="text" class="form-control"  name="manga" value="<?php  echo $manga;?>"/></td>
            </tr>
            <tr bgcolor="#ffccff">
                <td style="text-align: left;">Mảng B: </td>
                <td>
                    <input type="text" class="form-control"  name="mangb" value="<?php  echo $mangb;?>"/>
                </td>             
            </tr>
            <tr bgcolor="#ffccff">
                <td colspan="3">
                    <button class="btn btn-success" type="submit" name="tinh"> thực hiện</button>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">Số phần tử của mảng A: </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="ptma" value="<?php  echo $ptma;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Số phần tử của mảng B:</td>
                <td><input type="text" class="form-control"  disabled="disabled" name="ptmb" value="<?php  echo $ptmb;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mảng C: </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="mangc" value="<?php  echo $mangc;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mảng C tăng dần: </td>
                <td><input type="text" class="form-control" disabled="disabled"  name="td" value="<?php  echo $td;?>"/></td>
            </tr>
            <tr>
                <td style="text-align: left;">Mảng C giảm dần: </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="gd" value="<?php  echo $gd;?>"/></td> 
            </tr>
            <tr>
                <td colspan="2">(<span style="color: red"><b>Ghi chú: </b></span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>