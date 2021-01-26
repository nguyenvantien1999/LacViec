<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
		if (isset($_POST['mang'])) {
			$x = $_POST['mang'];
		}
		else{
			$x = "";
		}	

		if (isset($_POST['so'])) {
			$so = $_POST['so'];
		}
		else{
			$so = "";
		}

		$mang = explode(",", $x);
		function show($mangX){
			for ($i=0; $i < sizeof($mangX) ; $i++) { 
				echo $mangX[$i]. ", ";
			}
		}
		function timKiem($mang){
			$so = $_POST['so'];
			$flag = false;
			for ($i=0; $i < sizeof($mang); $i++) { 
				if ($mang[$i] == $so) {
					$vitri = $i + 1;
					echo "Tìm thấy ".$so." tại vị trí thứ ".$vitri. " ";
					$flag = true;
				}
			}
			if ($flag == false) {
				echo "Không tìm thấy ". $so." trong mảng";
			}
		}
	 ?>
	<div style="background-color: #99d6ff">
		<h1 style="color:white; text-align: center; padding-top: 5px; padding-bottom: 5px">Tìm kiếm</h1>
	</div>
	<form action="" method="post" accept-charset="utf-8">
		<table style="margin-left: auto; margin-right: auto;">
			<tbody>
				<tr>
					<td><b>Nhập mảng:</b></td>
					<td><input style="margin-left: 20px;" value="<?php echo $x ?>" size="50px" type="text" name="mang"><b style="color: red"> (*)</b></td>
				</tr>
				<tr>
					<td><b>Nhập số cần tìm:</b></td>
					<td><input style="margin-left: 20px;" value="<?php echo $so ?>" type="text" name="so"></td>
				</tr>
				<tr>
					<td></td>
					<td><input style="margin-left: 20px;" class="btn btn-success" type="submit" name="submit" value="Tìm kiếm"></td>
				</tr>
				<tr>
					<td>Mảng: </td>
					<td><input style="margin-left: 20px;" size="50px" type="text" value="<?php 
						if(isset($_POST['submit'])){
							show($mang); 			
						}
					 ?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Kết quả tìm kiếm</td>
					<td><input style="margin-left: 20px; color: red" size="50px" type="text" value="<?php 
						if(isset($_POST['submit'])){
							timKiem($mang); 			
						}
					 ?>"  disabled="disabled"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><b style="color: red">(*) </b>Các số được nhập cách nhau bằng dấu ","</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>