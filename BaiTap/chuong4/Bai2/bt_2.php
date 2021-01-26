<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php 
$dl =0;
$al = 0;
$hinh="";
if(isset($_POST['dl']))  
    $dl=trim($_POST['dl']); 
else $dl=0;

$mang_can = array("Quý ", "Giáp ","Ất ", "Bính ","Đinh ", "Mậu ", "Kỷ ", "Canh ", "Tân ", "Nhâm " );
$mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân","Dậu", "Tuất");
$mang_hinh = array("Hoi.jpg", "Ty.jpg", "Suu.jpg", "Dan.jpg", "Mao.jpg", "Thin.jpg", "Ti.jpg", "Ngo.jpg", "Mui.jpg", "Than.jpg","Dau.jpg", "Tuat.jpg");

if(isset($_POST['tinh']))
    if (is_numeric($dl)) {    
        $nam = $dl -3;
        $can = $nam % 10;
        $chi =  $nam % 12 ;
        $al = $mang_can[$can];
        $al .= $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
    }
    else {
        echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
    }
else $dl=0;

?>
    <form align='center' action="" method="post">
        <table border="0" style="margin: 0 auto;">
            <tr bgcolor="yellow">
                <th colspan="3" align="center"><h3><font color="red">TÍNH NĂM ÂM LỊCH</font></h3></th>
            </tr>
        <tr>
            <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>
        <tr>
            <td><input type="text" class="form-control"  name="dl" value="<?php  echo $dl;?>"/></td>
            <td><button type="submit" name="tinh"> =></button></td>
            <td><input type="text" class="form-control" disabled="disabled"  name="al" value="<?php  echo $al;?> "/></td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 150px; height:150px;"><img src="BaiTap/chuong4/Bai2/img/<?php echo"$hinh";?>" style="width:100%; height: 100%;"></td>
            <td></td>
        </tr>
        </table>
    </form>
</body>
</html>