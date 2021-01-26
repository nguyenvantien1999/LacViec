<?php 
	include 'header.inc'; 
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
	mysqli_set_charset($conn, 'UTF8');

	$maHS = $_POST['maHS'] ?? "";
	$tenHS = $_POST['tenHS'] ?? "";
	$diaChi = $_POST['diaChi'] ?? "";
	$sdt = $_POST['sdt'] ?? "";
	$email = $_POST['email'] ?? "";

	$errDK = "";
	if (isset($_POST['submit'])) {
		$image = $_FILES['image'] ? basename( $_FILES["image"]["name"]) : "";
	}
	if (isset($_POST['submit']) && isset($_FILES['image'])) {
		
		if ($_FILES["image"]['error'] != 0)
		{
			$errDK .= "Làm ơn thêm ảnh<br>";
		}

		$target_dir    = "anh/anh_hang_sua/";
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

				// if($check !== false)
				// {
				//     $errDK .= "Đây là file ảnh - " . $check["mime"] . ".";
				//     $allowUpload = true;
				// }
				// else
				// {
				//     $errDK .= "Không phải file ảnh.<br>";
				//     $allowUpload = false;
				// }

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
					$sqlAdd = 
					"insert into hang_sua value('$maHS', '$tenHS', '$diaChi', '$sdt', '$email', '$image')";

					// $query=mysqli_query($qlbansua, $sqlAdd);
					
					if (mysqli_query($qlbansua, $sqlAdd) == true){
						echo "<b class='text-success bg-light'>Thêm thành công</b>";
					}
					else echo "<b class='text-danger bg-light'>Thêm thất bại</b>";
		    }
		}
		else
		{
		    $errDK = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
		}
	}

 ?>
<div class="container mt-3 mb-5">
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data"> 
		<div class="pt-2 tieuDe mb-4 text-center">
			<h3><b>THÊM HÃNG SỮA</b></h3>	
		</div>
		<?php 
			echo $errDK;
		 ?>
		<table style="margin: 0 auto;" class="text-light">
			<tbody>
				<tr>
					<td>Mã hãng sữa</td>
					<td><input type="text" class="form-control" name="maHS" value=""></td>
				</tr>
				<tr>
					<td>Tên hãng sữa</td>
					<td><input type="text" class="form-control" name="tenHS" value=""></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td><input type="text" class="form-control" name="diaChi" value=""></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td><input type="text" class="form-control" name="sdt" value=""></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="form-control" name="email" value=""></td>
				</tr>
				<tr>
					<td>Ảnh hãng sữa</td>
					<td><input type="file" class="form-control" name="image" value=""></td>
				</tr>
				<tr class="text-center">
					<td colspan="2"><input type="submit" class="btn btn-success" name="submit" value="Thêm hãng sữa"></td>
				</tr>
			</tbody>
		</table>
	</form> 	
</div>


<?php 
	include 'footer.inc';
?>