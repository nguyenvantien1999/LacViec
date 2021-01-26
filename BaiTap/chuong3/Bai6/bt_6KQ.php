<?php 
    $kq =0;
    $toantu = "";

    if(isset($_POST['one'])) 
        $one=trim($_POST['one']); 
    else $one=0;

    if(isset($_POST['two']))  
        $two=trim($_POST['two']); 
    else $two=0;

    if(isset($_POST['pheptinh']))  
        $pheptinh=trim($_POST['pheptinh']); 
    else $pheptinh='cong';

    if(isset($_POST['tinh']))
    {
        if (is_numeric($two) && is_numeric($one))
        {  
            if($pheptinh=="cong")
            {
                $kq = $one + $two;
                $toantu = "Cộng";
            }else if($pheptinh=="tru"){
                $kq = $one - $two;
                $toantu = "Trừ";
            }else if($pheptinh=="nhan"){
                $kq = $one * $two;
                $toantu = "Nhân";
            }else if($pheptinh=="chia"){           
                if($two!=0)
                {
                    $kq = $one / $two;
                    $toantu ="Chia";
                }else{
                    $kq = "error";
                    echo "<font color='red'>Vui lòng nhập vào số khác không! </font>"; 
                }
            }
        }
        else {
            echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
            $kq=0;
        }
    }
    else $kq=0;
        echo "
        <table border=\"0\" style=\"margin: 0 auto;\"\">
            <tr bgcolor=\"#e6ffff\">
                <th colspan=\"2\" align=\"center\"><h3><font color=\"blue\">PHÉP TÍNH TRÊN HAI SỐ</font></h3></th>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    $toantu
                </td>
            </tr>
            <tr>
                <td>Số 1:</td>
                <td><input type=\"text\" class=\"form-control\"  name=\"one\" value=\"$one\"/></td>
            </tr>
            <tr>
                <td>Số 2:</td>
                <td><input type=\"text\" class=\"form-control\"  name=\"two\" value=\"$two\"/></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type=\"text\" class=\"form-control\"  name=\"two\" value=\"$kq\"/></td>
            </tr>
            <tr>
                <td colspan=\"2\" align=\"center\"><a href=\"javascript:window.history.back(-1);\">Quay lại trang trước</a></td>
            </tr>
        </table>
        ";
?>