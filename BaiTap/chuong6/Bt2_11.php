<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
	mysqli_set_charset($conn, 'UTF8');

	$masua = $_POST['masua'] ?? "";
	$tensua = $_POST['tensua'] ?? "";
	$hangsua = $_POST['hangsua'] ?? "";
	$loai = $_POST['loai'] ?? "";
	$trongluong = $_POST['trongluong'] ?? "";
	$dongia = $_POST['dongia'] ?? "";
	$tpdd = $_POST['tpdd'] ?? "";
	$loiich = $_POST['loiich'] ?? "";

	$errDK = "";
	//$image = basename( $_FILES["image"]["name"]) ?? "";
	if (isset($_POST['submit'])) {
		$image = $_FILES['image'] ? basename( $_FILES["image"]["name"]) : "";	
	}

	function loadDataCombobox($conn, $table, $key, $value, $name)
	{
		$query='select '.$key.', '.$value.' from '.$table;
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result) != 0)
		{
			while($row=mysqli_fetch_array($result))
			{
				$myKey = $row[$key];
				$myValue = $row[$value];
				echo "<option value='".$myKey."' "; 
						if(isset($_GET[$name]) && ($_GET[$name]==$myKey)) 
							echo "selected='selected'";
				echo ">".$myValue."</option>";
			}
		}
		mysqli_free_result($result);
	}
	if (isset($_POST['submit']) && isset($_FILES['image'])) {
		
		if ($_FILES["image"]['error'] != 0)
		{
			$errDK .= "Làm ơn thêm ảnh<br>";
		}

		// Đã có dữ liệu upload, thực hiện xử lý file upload

		//Thư mục bạn sẽ lưu file upload
		$target_dir    = "BaiTap/chuong6/Hinh_sua/";
		//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
		$target_file   = $target_dir . basename($_FILES["image"]["name"]);

		$allowUpload   = true;

		//Lấy phần mở rộng của file (jpg, png, ...)
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Cỡ lớn nhất được upload (bytes)
		$maxfilesize   = 800000;

		////Những loại file được phép upload
		$allowtypes    = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');

		//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
		if ($_FILES["image"]['name'] != null) {
			$check = getimagesize($_FILES["image"]["tmp_name"]);

			if($check !== false)
			{
			    $errDK .= "Đây là file ảnh - " . $check["mime"] . ".";
			    $allowUpload = true;
			}
			else
			{
			    $errDK .= "Không phải file ảnh.<br>";
			    $allowUpload = false;
			}

			// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
			if ($_FILES["image"]["size"] > $maxfilesize)
			{
			    $errDK .= "Không được upload ảnh lớn hơn $maxfilesize (bytes).<br>";
			    $allowUpload = false;
			}

			// Kiểm tra kiểu file
			if (!in_array($imageFileType,$allowtypes ))
			{
			    $errDK .= "Chỉ được upload các định dạng JPG, PNG, JPEG<br>";
			    $allowUpload = false;
			}
		}

		if ($allowUpload)
		{
		    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		    {
		        $avt = $_FILES["image"]["name"];

		        	$qlbansua = mysqli_connect('localhost', 'root', '', 'qlbansua');
					mysqli_set_charset($conn, 'UTF8');
					$sqlAdd = "insert into sua value('$masua', '$tensua', '$hangsua', '$loai', '$trongluong', 
						'$dongia', '$tpdd', '$loiich', '$image')";

					$query=mysqli_query($qlbansua, $sqlAdd);
					
					$errDK = "<b class='text-success bg-light'>Thêm thành công</b>";
		    }
		}
		else
		{
		    $errDK = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<?php 
		echo "$errDK";
	 ?>
	<table border="0" style="margin: 0 auto;" bgcolor="#ffe6e6">
		<tr bgcolor="#ff6666">
			<th colspan="3"><h4 class="text-center text-light"><b>THÊM SỮA MỚI</b></h4></th>
		</tr>
		<tr>
			<td>Mã sữa:</td>
			<td><input class="form-control" type="text" name="masua" value="<?php echo"$masua"; ?>"></td>
		</tr>
		<tr>
			<td>Tên sữa:</td>
			<td><input class="form-control" type="text" name="tensua" value="<?php echo"$tensua"; ?>"></td>
		</tr>
		<tr>
			<td>Hãng sữa:</td>
			<td>
				<select name="hangsua">
					<option value="">None</option>
					<?php  
						loadDataCombobox($conn, 'hang_sua', 'Ma_hang_sua', 'Ten_hang_sua', 'hangsua');
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Loại sữa:</td>
			<td>
				<select name="loai">
					<option value="">None</option>
					<?php 
						loadDataCombobox($conn, 'loai_sua', 'Ma_loai_sua', 'Ten_loai', 'loai');
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Trọng lượng:</td>
			<td><input class="form-control" type="text" name="trongluong" value="<?php echo"$trongluong"; ?>"></td>
			<td>(gr hoặc ml)</td>
		</tr>
		<tr>
			<td>Đơn giá:</td>
			<td><input class="form-control" type="text" name="dongia" value="<?php echo"$dongia"; ?>"></td>
			<td>(VNĐ)</td>
		</tr>
		<tr>
			<td>Thành phần dinh dưỡng:</td>
			<td><textarea class="form-control" name="tpdd"><?php echo"$tpdd"; ?></textarea></td>
		</tr>
		<tr>
			<td>Lợi ích:</td>
			<td><textarea class="form-control" name="loiich"><?php echo"$loiich"; ?></textarea></td>
		</tr>
		<tr>
			<td>Hình ảnh:</td>
			<td>
				<input type="file" name="image" value="<?php echo"$image"; ?>">
			</td>
		</tr>
		<tr class="text-center">
			<td colspan="2"><br><input class="btn btn-success" type="submit" name="submit" value="Thêm mới"></td>
		</tr>
	</table>
</form>
