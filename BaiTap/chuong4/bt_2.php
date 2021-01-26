<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/index.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../fontawesome5112/css/all.css" >
 
    <script src="excel-bootstrap-table-filter-bundle.js"></script>
    <link rel="stylesheet" href="excel-bootstrap-table-filter-style.css">
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

        <table border="0">
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

	            <td style="width: 150px; height:150px;"><img src="./img/<?php echo"$hinh"; ?>" style="width:100%; height: 100%;"></td>
	            <td></td>
	        </tr>
        </table>

    </form>
</body>
</html>