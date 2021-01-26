<?php
	include 'header.inc'; 
	$user = $_SESSION['username'];
	$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
	mysqli_set_charset($conn, 'UTF8');
	$sql="select username, ho_ten, gioi_tinh, anh, level, ngaySinh from user where username ='$user'";
	$result = mysqli_query($conn, $sql);

	$errDK = "";
	if (isset($_POST['submit'])) {
		$ten = $_POST['ten'] ?? "";
		$gioitinh = $_POST['gioitinh'] ?? "";
		$ngaySinh = $_POST['ngaySinh'] ?? "";
		$avt = $_POST["anh"] ?? "";

		//==================================ẢNH============================================= 
		$target_dir    = "E:/Tien/Program File/xampp/htdocs/BaiTap/BaoCao/anh/avatar/";

		$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);

		$allowUpload   = true;

		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$maxfilesize   = 800000;

		$allowtypes    = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');

		if ($_FILES["fileupload"]['name'] != null) {
			$check = getimagesize($_FILES["fileupload"]["tmp_name"]);

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

			if ($_FILES["fileupload"]["size"] > $maxfilesize)
			{
			    $errDK .= "Không được upload ảnh lớn hơn $maxfilesize (bytes).<br>";
			    $allowUpload = false;
			}

			if (!in_array($imageFileType,$allowtypes ))
			{
			    $errDK .= "Chỉ được upload các định dạng JPG, PNG, JPEG<br>";
			    $allowUpload = false;
			}
		}
		if ($allowUpload)
			if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
				$avt = $_FILES["fileupload"]["name"];

		$sql='update user set 
			ho_ten = "'.$ten.'", 
			gioi_tinh = "'.$gioitinh.'", 
			ngaySinh = "'.$ngaySinh.'",
			anh = "'.$avt.'" 
			where username = "'.$user.'"';
		if (mysqli_query($conn, $sql)){
			header("Refresh:0");
		}
		else echo "<b class='text-danger bg-light'>Cập nhật thất bại</b>";
		// else echo "Error: " . mysqli_error($conn);
	}

?>
<link rel="stylesheet" type="text/css" href="css/thongtin.css">
<div id="content" class="container">
	<div id="title" class="mb-3">
		<h3 class="mt-3"><b><i>THÔNG TIN TÀI KHOẢN</i></b></h3>
	</div>
	<div class="row">
		<div class="col-6">
			<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<table class="m-3">
					<tbody>
						<?php 
							if(mysqli_num_rows($result) <> 0)
							{ 	
								while($rows=mysqli_fetch_row($result))
								{ 
									echo "<tr>
											<td class=\"pr-4\" rowspan=\"7\">
												<img class=\"img-fluid img-thumbnail\" src=\"anh/avatar/$rows[3]\" width=\"150px\" height=\"auto\">
												<input type=\"text\" name=\"anh\" value=\"$rows[3]\" hidden=\"true\">
											</td>
										</tr>";
									echo "<tr>
											<td><b>Tài khoản: </b>$rows[0]</td>
										</tr>";
									echo "<tr>
											<td>
												<b>Họ và tên: </b>
												<input class=\"form-control\" type=\"text\" name=\"ten\" value=\"$rows[1]\">
											</td>
										</tr>";
						?>
										<tr>
											<td><b>Giới tính: </b>
												<input type="radio" name="gioitinh" value="Nam" 
													<?php 
														if ($rows[2] == 'Nam') {
															echo 'checked="checked"';
														} 
													?>>Nam
													<input type="radio" name="gioitinh" value="Nữ" 
													<?php 
														if ($rows[2] == 'Nữ') {
															echo 'checked="checked"';
														} 
													?>>Nữ
											</td>
										</tr>
						<?php
									echo "<tr>
											<td>
												<b>Ngày sinh: </b>
												<input class=\"form-control\" type=\"text\" name=\"ngaySinh\" value=\"$rows[5]\">
											</td>
										</tr>";
									echo "<tr>
											<td><b>Level: </b>$rows[4]</td>
										</tr>";
									echo "<tr>
											<td><a href=\"doiMK.php\"><b>Đổi mật khẩu</b></a></td>
										</tr>";
									echo "<tr>
											<td colspan=\"2\"><input type=\"file\" name=\"fileupload\" ></td>
										</tr>";
									echo "<tr>
											<td colspan=\"2\" class=\"text-center\">
											<input class='btn btn-success' type='submit' name='submit' value='Cập nhật'>
										</tr>";
								}
							}
						 ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	
</div>
<?php 
	include 'footer.inc';
?>
