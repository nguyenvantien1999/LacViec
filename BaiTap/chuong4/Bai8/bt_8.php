<!DOCTYPE html>
<html>
<head>
	<title>Bài 8</title>
</head>
<body>
	<?php 
		if (isset($_POST['mang'])) {
			$x = $_POST['mang'];
		}
		else{
			$x = "";
		}	
		$desc = null;
      	$asc = null;

		if ($x !== '') {
	        $file = fopen("mang_bt8.txt", "w");
	        fwrite($file, $x);
	        $arr = explode(',', $x);
	        sort($arr);
	        $asc = join(', ', $arr);
	        fwrite($file, "\n" . $asc);
	        rsort($arr);
	        $desc = join(', ', $arr);
	        fwrite($file, "\n" . $desc);
      	}
	 ?>
	<div style="background-color: #99d6ff">
		<h1 style="color:white; text-align: center; padding-top: 5px; padding-bottom: 5px">Sắp xếp mảng</h1>
	</div>
	<form action="" method="post" accept-charset="utf-8">
		<table style="margin-left: auto; margin-right: auto;">
			<tbody>
				<tr>
					<td><b>Nhập mảng:</b></td>
					<td><input style="margin-left: 20px;" value="<?php echo $x ?>" size="50px" type="text" name="mang"><b style="color: red"> (*)</b></td>
				</tr>
				<tr>
					<td></td>
					<td><input style="margin-left: 20px;" class="btn btn-success" type="submit" name="submit" value="Sắp xếp tăng/giảm"></td>
				</tr>
				<tr>
					<td><b style="color: red">Sau khi sắp xếp</b></td>
				</tr>
				<tr>
					<td>Tăng dần</td>
					<td><input style="margin-left: 20px;" size="50px" type="text" value="<?php echo $asc?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Giảm dần</td>
					<td><input style="margin-left: 20px;" size="50px" type="text" value="<?php echo $desc?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><b style="color: red">(*) </b>Các số được nhập cách nhau bằng dấu ","</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>