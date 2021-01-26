<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php 
        function nam_nhuan($nam)
        {
            if($nam % 400 == 0 || $nam % 4 == 0 && $nam % 100 != 0 )
            {
                return 1;
            }else
            {
                return 0;
            }
        }
        $namnhuan1 = "";
        $namnhuan2 = "";
        $nam1 =0;
        $nam2 = 0;
        $message1 ="";
        $message2 ="";
        if(isset($_POST['nam1']))  
            $nam1=trim($_POST['nam1']); 
        else $nam1=0;

        if(isset($_POST['nam2']))  
            $nam2=trim($_POST['nam2']); 
        else $nam2=0;

        if(isset($_POST['tinh1']))
        {
            if (is_numeric($nam1)) {    
                if($nam1 <2000)
                {
                    foreach(range($nam1, 2000) as $year)
                    {
                        if(nam_nhuan($year)==1)
                        {
                            $namnhuan1 .= "$year ";
                        }                     
                    }
                }else{
                    $message1 =  "<font color='red'>Vui lòng nhập vào số nhỏ hơn 2000! </font>";
                }
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
            }
        }

        if(isset($_POST['tinh2']))
            if (is_numeric($nam2)) {    
                if($nam2 >2000)
                {
                    foreach(range(2000 ,$nam2 ) as $year)
                    {
                        if(nam_nhuan($year)==1)
                        {
                            $namnhuan2 .= "$year ";
                        }                     
                    }
                }else{
                    $message2 =  "<font color='red'>Vui lòng nhập vào số nhỏ hơn 2000! </font>";
                }
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
            }
    ?>

    <form align='center' action="" method="post">
        <table border="0" style="width:500px; margin: 0 auto;" bgcolor="#e6ffff">
            <tr>
                <td colspan="3" class="bg-light">
                    <p style="color: blue">
                        <br>
                        Năm nhập vào nhỏ hơn năm 2000
                    </p>
                </td>
            </tr>
            <tr bgcolor="blue">
                <th colspan="3" align="center"><h3><font color="white">TÌM NĂM NHUẬN</font></h3></th>
            </tr>
            <tr>
                <td>Năm: </td>
                <td><input type="text" class="form-control"  name="nam1" value="<?php  echo $nam1;?>"/></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        <?php
                            if($message1 != "")
                            {
                                echo $message1;
                            } 
                            else if($namnhuan1 != "")
                                echo "$namnhuan1 là năm nhuận" ;
                            else {
                            }
                        ?> 
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="btn btn-info" style="color: white;" type="submit" name="tinh1"> Tìm năm nhuận</button>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="bg-light">
                    <p style="color: blue">
                        <br>
                        Năm nhập vào lớn hơn năm 2000
                    </p>
                </td>
            </tr>
            <tr bgcolor="blue">
                <th colspan="3" align="center"><h3><font color="white">TÌM NĂM NHUẬN</font></h3></th>
            </tr>
            <tr>
                <td>Năm: </td>
                <td><input type="text" class="form-control"  name="nam2" value="<?php  echo $nam2;?>"/></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        <?php
                            if($message2 != "")
                            {
                                echo $message2;
                            } 
                            else if($namnhuan2 !="")
                                echo "$namnhuan2 là năm nhuận" ;
                        ?> 
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="btn btn-info" style="color: white"  type="submit" name="tinh2"> Tìm năm nhuận</button>
                </td>
            </tr>
        </table>

    </form>
</body>
</html>