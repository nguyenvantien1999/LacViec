	<!DOCTYPE html>
<html>
<head>
	<title>Bài tập 10</title>
</head>
<body>
	<?php
      $flower = $_POST['hoa'] ?? null;
      $flowersStr = $_POST['gioHoa'] ?? null;
      $err = null;

      if ($flower && $flower !== '') {
        $flowers = explode(' -- ', $flowersStr);
        if (isExists($flowers, $flower)) {
          $err = 'Hoa đã tồn tại';
        } else {
          array_push($flowers, $flower);
          $flowersStr = join(' -- ', $flowers);
        }
      }

      function isExists($arr, $str) {
        for($i = 0; $i < count($arr); $i++) {
          if (strcasecmp($arr[$i], $str) === 0) {
            return true;
          }
        }
        return false;
      }
    ?>
	<div style="background-color: #ffe680">
		<h1 style="color:red; text-align: center; padding-top: 5px; padding-bottom: 5px">MUA HOA</h1>
	</div>
	
	<form class="p-5 form-inline" action="" method="post" accept-charset="utf-8" 
		style="background-color: #ffb3b3">
		<table style="margin-left: auto; margin-right: auto;">
			<tbody>
				<tr>
					<td style="color: red;"><b>Loại hoa bạn chọn:</b></td>
					<td>
						<input class="form-control" style="margin-left: 20px;" type="text" name="hoa"><br> 
					</td>
					<td>
						<input class="btn btn-success" type="submit" name="addHoa" value="Thêm vào giỏ hoa">
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="3"><label style="color: red; "><?php echo $err ?></label></td>
					<td></td>
				</tr>
				<tr>
					<td style="color: red;"><b>Giỏ hoa của bạn có:</b></td>
				</tr>
				<tr style="text-align: center;">
					<td colspan="3">
						<textarea class="form-control" readonly="true" cols="30" name="gioHoa">
							<?php echo $flowersStr ?>
						</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $flowersStr ?>
</body>
</html>