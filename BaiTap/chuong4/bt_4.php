<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php 
function tong($arr,$so){
    $tong = 0;
    for($i=0;$i<count($arr);$i++){
        $tong += $arr[$i];
    }
    return $tong;
}
$so =0;
$str="";
$str_kq="";
$tong="";

if(isset($_POST['so'])){
    $so=$_POST['so'];
}

if(isset($_POST['tinh'])){
    $str=$_POST['so'];
    $arr=explode(",",$str);
    $str_kq=implode(",",$arr);
    $tong=tong($arr,$so); 
}

?>
    <form align='center' action="" method="post">
        <table border="0" style="width:500px; margin: 0 auto;" bgcolor="#e6ffff">          
            <tr bgcolor="#00b3b3">
                <th colspan="3" align="center"><h3><font color="white">NHẬP VÀ TÍNH TRÊN DÃY SỐ</font></h3></th>
            </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" class="form-control"  name="so" value="<?php  echo $so;?>"/></td>
                <td style="color: red">(*)</td>
            </tr>      
            <tr>
                <td colspan="3"><button  type="submit" name="tinh" class="btn btn-warning"> Tổng dãy số</button></td>
            </tr>
            <tr>
                <td>Tổng dãy số </td>
                <td><input type="text" class="form-control"  disabled="disabled" name="tong" value="<?php  echo $tong;?>"/></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><span style="color: red">(*)</span> Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>