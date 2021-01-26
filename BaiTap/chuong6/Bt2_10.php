<?php  
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
	mysqli_set_charset($conn, 'UTF8');

	$name = $_GET['name'] ?? "";
	$loai_sua = $_GET['loai_sua'] ?? "";
	$hang_sua = $_GET['hang_sua'] ?? "";
?>
<div style="background-color: #ffb3b3">
<form action="" method="get" class="form-inline">
	<table style="margin: 0 auto;">
		<tr><td><h4 style="color: #ff1a75"><b>TÌM KIẾM THÔNG TIN SỮA NÂNG CAO</b></h4></td></tr>
		<tr>
			<td>
				<span><b style="color: #cc0052">Loại sữa</b></span>
				<select name="loai_sua">
					<option value="">None</option>
					<?php  
						$query="select * from loai_sua";
						$result=mysqli_query($conn,$query);
						if(mysqli_num_rows($result) != 0)
						{
							while($row=mysqli_fetch_array($result))
							{
								$ma_loai_sua=$row['Ma_loai_sua'];
								$ten_loai=$row['Ten_loai'];
								echo "<option value='".$ma_loai_sua."' "; 
										if(isset($_GET['loai_sua']) && ($_GET['loai_sua']==$ma_loai_sua)) 
											echo "selected='selected'";
								echo ">".$ten_loai."</option>";
							}
						}
						mysqli_free_result($result);
					?>
				</select>
				<span><b style="color: #cc0052">Hãng sữa</b></span>
				<select name="hang_sua">
					<option value="">None</option>
					<?php  
						$query="select Ma_hang_sua, Ten_hang_sua from hang_sua";
						$result=mysqli_query($conn,$query);
						if(mysqli_num_rows($result) != 0)
						{
							while($row=mysqli_fetch_array($result))
							{
								$ma_hang_sua=$row['Ma_hang_sua'];
								$ten_hang_sua=$row['Ten_hang_sua'];
								echo "<option value='".$ma_hang_sua."' "; 
										if(isset($_GET['hang_sua']) && ($_GET['hang_sua']==$ma_hang_sua)) 
											echo "selected='selected'";
								echo ">".$ten_hang_sua."</option>";
							}
						}
						mysqli_free_result($result);
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><b style="color: #cc0052">Tên sữa </b><input class="form-control" type="text" name="name" value="<?php echo $name ?>">
			<input class="btn btn-success" type="submit" name="submit" value="Tìm kiếm"></td>
			<input type="text" name="url" value="c6b10" hidden="true">
		</tr>
	</table>
</form>

<?php 
	if ($name!="" || $loai_sua!="" || $hang_sua!="") { // de them option "", neu dc set thi them dk vao cau query

		$sql='select Ma_sua, Ten_sua, hang_sua.Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh
				from sua, hang_sua 
				where sua.Ma_hang_sua = hang_sua.Ma_hang_sua';
				// and (sua.Ma_loai_sua = "'.$loai_sua.'" 
				// or sua.Ma_hang_sua = "'.$hang_sua.'" 
				// or sua.Ten_sua like "%'.$name.'%")';

		if ($name!="" && $loai_sua=="" && $hang_sua=="") {
			$sql = $sql.' and sua.Ten_sua like "%'.$name.'%"';
		}
		else if ($name!="" && $loai_sua=="" && $hang_sua!="") {
			$sql = $sql.' and sua.Ten_sua like "%'.$name.'%" and sua.Ma_hang_sua = "'.$hang_sua.'"';
		}
		else if ($name!="" && $loai_sua!="" && $hang_sua=="") {
			$sql = $sql.' and sua.Ten_sua like "%'.$name.'%" and sua.Ma_loai_sua = "'.$loai_sua.'"';
		}
		else if ($name=="" && $loai_sua!="" && $hang_sua=="") {
			$sql = $sql.' and sua.Ma_loai_sua = "'.$loai_sua.'"';
		}
		else if ($name=="" && $loai_sua!="" && $hang_sua!="") {
			$sql = $sql.' and sua.Ma_loai_sua = "'.$loai_sua.'" and sua.Ma_hang_sua = "'.$hang_sua.'"';
		}
		else if ($name=="" && $loai_sua=="" && $hang_sua!="") {
			$sql = $sql.' and sua.Ma_hang_sua = "'.$hang_sua.'"';
		}
		else if ($name!="" && $loai_sua!="" && $hang_sua!="") {
			$sql = $sql.' and sua.Ten_sua like "%'.$name.'%" and sua.Ma_hang_sua = "'.$hang_sua.'" 
				and sua.Ma_loai_sua = "'.$loai_sua.'"';
		}

		$result = mysqli_query($conn, $sql);

		$count = mysqli_num_rows($result);
		
		if($count!=0)
		{
			echo "<br><p class='text-center'><b>Có $count sản phẩm được tìm thấy</b></p>";
			echo "<table border='1'>";
			while($rows=mysqli_fetch_row($result))
			{
				echo '<th colspan=\'2\' class=\'text-center\'>'.$rows[1].' - '.$rows[2].'</th>
						<tr class=\'bg-white\'>
							<td><img src="BaiTap/chuong6/Hinh_sua/'.$rows[7].'" alt="hinh sua"></td>
							<td><span><b><i>Thành phần dinh dưỡng:</i></b></span><br>'
							.'<span>'.$rows[5].'</span><br>'
							.'<span><b><i>Lợi ích:</i></b></span>'
							.'<span>'.$rows[6].'</span><br>'
							.'<span style="float:right;"><b><i>Trọng lượng:</i></b> '.$rows[3]
							.' - <b><i>Đơn giá:</i></b> '.$rows[4].'VNĐ</span>
							</td>
						</tr>';
			}
			echo"</table>";
		}
		else echo "Không tìm thấy sản phẩm này.<br>";
	}
?>
</div>