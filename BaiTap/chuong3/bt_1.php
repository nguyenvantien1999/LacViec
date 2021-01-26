<?php 
    if(isset($_POST['chieudai']))  
        $chieudai=trim($_POST['chieudai']); 
    else $chieudai=0;
    if(isset($_POST['chieurong'])) 
        $chieurong=trim($_POST['chieurong']); 
    else $chieurong=0;
    if(isset($_POST['tinh']))
            if (is_numeric($chieudai) && is_numeric($chieurong))  
           $dientich=$chieudai * $chieurong;
            else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $dientich="";
                }
    else $dientich=0;
?>
<link rel="stylesheet" type="text/css" href="../../css/index.css">
<form action="" method="post">       
    <table border="0" style="margin: 0 auto;">
        <tr bgcolor="yellow">
            <th colspan="2" align="center"><h3><font color="red">DIỆN TÍCH HÌNH CHỮ NHẬT</font></h3></th>
        </tr>
        <tr>
            <td class="pt-3">Chiều dài:</td>
            <td class="pt-3">
                <input type="text" name="chieudai" value="<?php  echo $chieudai;?>" class="form-control"/>
            </td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td>
                <input type="text" name="chieurong" value="<?php  echo $chieurong;?>" class="form-control"/>
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td>
                <input type="text" name="dientich" disabled="disabled" value="<?php  echo $dientich;?>" 
                class="form-control"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" class="btn btn-success" value="Tính" name="tinh" />
            </td>
        </tr>
    </table>
</form>


