<?php
	include 'header.inc'; 
?>
<link rel="stylesheet" type="text/css" href="css/dangnhap.css">
<?php
	$err = "";
	if(isset($_POST['ok']))
	{ 
		if($_POST['username'] == NULL){
			$u = "";
			$err .= "Làm ơn nhập Username". "<br>";
		} 
		else $u=$_POST['username'];
		if($_POST['password'] == NULL){
			$p = "";
			$err .= "Làm ơn nhập Password";	
		} 
		else $p=$_POST['password'];

		if($u && $p)
		{ 
			$conn=mysqli_connect("localhost","root","","lacviet") or die("can't connect this database");
			$sql="select * from user where username='".$u."' and password='".$p."'";
			$query=mysqli_query($conn, $sql);
			if(mysqli_num_rows($query) == 0)
				$err .= "Username hoặc password không đúng, vui lòng nhập lại";
			else
			{ 
				$row=mysqli_fetch_array($query);
				$_SESSION['username'] = $row['username'];
				$_SESSION['level'] = $row['level'];
				header("Location:index.php");
			}
		}
	}

	$errDK = "";
	if (isset($_POST['dk'])) {
		if($_POST['userDK'] == NULL){
			$uDK = "";
			$errDK .= "Làm ơn nhập Username". "<br>";
		} 
		else $uDK=$_POST['userDK'];

		if($_POST['passDK'] == NULL){
			$pDK = "";
			$errDK .= "Làm ơn nhập Password". "<br>";	
		} 
		else $pDK=$_POST['passDK'];

		if($_POST['repassDK'] == NULL){
			$rpDK = "";
			$errDK .= "Làm ơn nhập lại Password". "<br>";	
		} 
		else $rpDK=$_POST['repassDK'];

		if($_POST['hotenDK'] == NULL){
			$htDK = "";
			$errDK .= "Làm ơn nhập họ tên". "<br>";	
		} 
		else $htDK=$_POST['hotenDK'];

		if($_POST['gtDK'] == NULL){
			$gtDK = "";
			$errDK .= "Làm ơn nhập giới tính". "<br>";	
		} 
		else $gtDK=$_POST['gtDK'];

		if($_POST['ngaySinh'] == NULL){
			$ngaySinhDK = "";
			$errDK .= "Làm ơn nhập ngaySinh". "<br>";	
		} 
		else $ngaySinhDK=$_POST['ngaySinh'];

		// xử lý file ==============================================
		// file upload.php xử lý upload file
		// Kiểm tra có dữ liệu fileupload trong $_FILES không
		// Nếu không có thì dừng
		if (!isset($_FILES["fileupload"]))
		{
		    $errDK .= "Dữ liệu không đúng cấu trúc<br>";
		}
		// Kiểm tra dữ liệu có bị lỗi không
		if ($_FILES["fileupload"]['error'] != 0)
		{
			$errDK .= "Làm ơn thêm ảnh<br>";
		}

		// Đã có dữ liệu upload, thực hiện xử lý file upload

		//Thư mục bạn sẽ lưu file upload
		$target_dir    = "E:/Tien/Program File/xampp/htdocs/BaiTap/BaoCao/anh/avatar/";
		//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
		$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);

		$allowUpload   = true;

		//Lấy phần mở rộng của file (jpg, png, ...)
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Cỡ lớn nhất được upload (bytes)
		$maxfilesize   = 800000;

		////Những loại file được phép upload
		$allowtypes    = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');

		//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
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

			// Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
			// Bạn có thể phát triển code để lưu thành một tên file khác
			if (file_exists($target_file))
			{
			    $errDK .= "Tên file đã tồn tại trên server, không được ghi đè<br>";
			    $allowUpload = false;
			}
			// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
			if ($_FILES["fileupload"]["size"] > $maxfilesize)
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
		    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
		    {
		        $avt = $_FILES["fileupload"]["name"];

		        if($uDK && $pDK && $pDK == $rpDK)
				{ 
					$conn=mysqli_connect("localhost","root","","lacviet") 
							or die("can't connect this database");
					$sql="insert into user value('$uDK', '$pDK', '$htDK', '$gtDK', '$ngaySinhDK', '$avt', '3')";
					$query=mysqli_query($conn, $sql);

					$errDK = "<b class='text-success bg-light'>Đăng ký thành công</b>";
				}

		    }
		    // else
		    // {
		    //     echo "Có lỗi xảy ra khi upload file.";
		    // }
		}
		else
		{
		    $errDK = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
		}
		// kết thúc xử lý file =====================================

	}
?>
<div class="container mb-5" align="center">
	<div class="row">
		<div class="col-6">
			<div class="pt-2 tieuDe mb-4">
				<h3><b>ĐĂNG NHẬP</b></h3>	
			</div>
			<form action="" method="post"> 
				<table id="login">
					<tbody>
						<tr>
							<td class="text-danger" colspan="2"><b><?php echo "$err"; ?></b></td>
						</tr>
						<tr>
							<td>Username:</td>
							<td><input type="email" name="username" size=25 class="form-control" /></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password" size=25 class="form-control"/></td>
						</tr>
						<tr>
							<td class="pt-1" colspan="2" style="text-align: center;">
								<input class="btn btn-info" type="submit" name="ok" value="Đăng nhập"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="col-6">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="pt-2 tieuDe mb-4 text-center">
					<h3><b>ĐĂNG KÝ</b></h3>	
				</div>
			    <table id="dangky">
			        <tr>
						<td class="text-danger" colspan="2"><b><?php echo "$errDK"; ?></b></td>
					</tr>
			        <tr>
			            <td>Username:</td>
			            <td><input type="email" name="userDK" class="form-control" /></td>
			        </tr>
			        <tr>
			            <td>Họ và tên:</td>
			            <td><input type="text" name="hotenDK" class="form-control" /></td>
			        </tr>
			        <tr>
			        	<td>Giới tính:</td>
			            <td>
							<input type="radio" name="gtDK" value="Nam" checked="true"> Nam
							<input type="radio" name="gtDK" value="Nữ"> Nữ
						</td>
			        </tr>
			        <tr>
			            <td>Họ và tên:</td>
			            <td><input type="date" name="ngaySinh" class="form-control" /></td>
			        </tr>
			        <tr>
			            <td>Ảnh đại diện:</td>
			            <td><input type="file" name="fileupload" ></td>
			        </tr>
			        <tr>
			            <td>Password:</td>
			            <td><input type="password" name="passDK" class="form-control" /></td>
			        </tr>
			        <tr>
			            <td>Nhập lại Password:</td>
			            <td>
			                <input type="password" name="repassDK" class="form-control" />
			            </td>	
			        </tr>
			        <tr>
			            <td colspan="2" align="center"><input class="btn btn-success" type="submit" 
			            	value="Đăng ký" name="dk"/></td>
			        </tr>
			    </table>
			</form>
		</div>
	</div>
</div>
<?php 
	include 'footer.inc';
?>