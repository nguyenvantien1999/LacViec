<?php 
	include 'header.inc';
	$x = [];
	$mua = [];

	function check($i){
		global $x;
		if($i >= 1){
			for($y = 0; $y < $i; $y++){
				if($x[$i] == $x[$y]){
					$x[$i] = rand(1,55);
					check($i);
				}
			}
		}
	}

	if (isset($_POST['submit'])) {
		
		for ($i=0; $i < 7; $i++) { 
			$post = 'mua'. $i;
			$mua[$i] = $_POST[$post] ?? "";
		}

		$so = $_POST['so'] ?? "";
		$x = explode(',', $so);
	}
	else
		for($i = 0; $i < 7; $i++){
			$x[$i] = rand(1,55);
			check($i);	
		}


	for($i = 0; $i < 6; $i++){
		for($y = 0; $y < 5; $y++){
			if($x[$y]>$x[$i]){
				$tam = $x[$i];
				$x[$i] = $x[$y];
				$x[$y] = $tam;
			}
		}
	}

	echo "<div class='container bg-light' style='border-right: 25px solid red;
	border-left: 25px solid red;'>";
	echo "<h1 class='pt-5' style='color: #ffcc00; text-align:center'> <b> Kết quả xổ số Vietlot ngày ".date("d/m/Y"). " </b></h1><br>";
	echo "<h1 style='color: red; text-align:center'>";
	for($i = 0; $i < 6; $i++){
		
		if($x[$i]< 10){
			echo "0", $x[$i];
			if($i < 5){
				echo "-";	
			}			
		}
		else{
			echo $x[$i];
			if($i < 5){
				echo "-";	
			}
		}
		
	}
	echo "<span style='color: blue;'>\t|\t";
	if($x[6]< 10){
		echo "0", $x[6];			
	}
	else
		echo $x[6];
	echo "</span>";
	echo "</h1>";

	$tong = 0;
	for($i = 0; $i < sizeof($mua); $i++){
		for($y = 0; $y < 6; $y++){
			if($mua[$i] == $x[$y]){
				$tong += 1;
			}
		}
	}
	$flag = false;
	$giai = "";
	switch ($tong) {
		case 6:
			$giai = "<h1>Trúng giải Jackpot 1</h1>";
			echo "<script type=\"text/javascript\" src=\"https://itexpress.vn/js/new-year.js\"></script>";
			break;
		case 5:
			for ($i=0; $i < sizeof($mua); $i++) { 
				if ($mua[$i] == $x[6]) {
					$flag = true;
				}
			}
			if($flag == true){
				$giai = "<h1>Trúng giải Jackpot 2</h1>";
			}
			else{
				$giai = "<h1>Trúng giải nhất</h1>";
			}
			echo "<script type=\"text/javascript\" src=\"https://itexpress.vn/js/new-year.js\"></script>";
			break;
		case 4:
			$giai = "<h1>Trúng giải nhì</h1>";
			echo "<script type=\"text/javascript\" src=\"https://itexpress.vn/js/new-year.js\"></script>";
			break;
		case 3:
			$giai = "<h1>Trúng giải ba</h1>";
			echo "<script type=\"text/javascript\" src=\"https://itexpress.vn/js/new-year.js\"></script>";
			break;
		
	}
 ?>
 <style type="text/css" media="screen">
 	table input{
 		width: 50px;
 	}
 </style>
<form action="" method="post" accept-charset="utf-8">
	<table style="margin: 0 auto">
		<tr>
			<th colspan="6" class="text-center"><b>Nhập vào vé số của bạn</b></th>
		</tr>
		<tr>
			<td><input type="number" name="mua0" min="0" max="55" value="<?php echo $mua[0];?>"></td>
			<td><input type="number" name="mua1" min="0" max="55" value="<?php echo $mua[1];?>"></td>
			<td><input type="number" name="mua2" min="0" max="55" value="<?php echo $mua[2];?>"></td>
			<td><input type="number" name="mua3" min="0" max="55" value="<?php echo $mua[3];?>"></td>
			<td><input type="number" name="mua4" min="0" max="55" value="<?php echo $mua[4];?>"></td>
			<td><input type="number" name="mua5" min="0" max="55" value="<?php echo $mua[5];?>"></td>
		</tr>
	</table>
	<div style="text-align: center;">
		<audio class="" src="audio/XoSoMienBac.mp3" autoplay loop></audio>
		<input type="text" name="so" hidden="true" value="<?php
				for($i = 0; $i < sizeof($x); $i++)
					echo $x[$i].',';
			?>
		">
		<input class="btn btn-success mb-5 mt-1" type="submit" name="submit" value="Tra giải">
		<h1 class="text-danger pb-5"><strong><?php echo $giai?></strong></h1>
	</div>
</form>

<?php
	echo "</div>";
	include 'footer.inc';
?>