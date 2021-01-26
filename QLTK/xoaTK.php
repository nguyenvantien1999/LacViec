<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
	mysqli_set_charset($conn, 'UTF8');

	$user = $_GET['id'] ?? "";
	$pass = "";
	$ten = "";
	$gioitinh = "";
	$ngaySinh = "";
	$level = "";

	$query='select * from user where username = "'.$user.'"';
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result) != 0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$pass = $row['password'];
			$ten = $row['ho_ten'];
			$gioitinh = $row['gioi_tinh'];
			$ngaySinh = $row['ngaySinh'];
			$level = $row['level'];
		}
	}
	mysqli_free_result($result);

	if (isset($_POST['submit'])) {

		if ($user != $_SESSION['username']) {
			$sql='delete from user 
			where username = "'.$user.'" '; 
			if (mysqli_query($conn, $sql)){
				echo "<b class='text-success bg-light'>Xóa thành công</b>";
				$pass = "";
				$ten = "";
				$gioitinh = "";
				$ngaySinh = "";
				$level = "";
			}
			else echo "<b class='text-danger bg-light'>Xóa thất bại</b>";
			// else echo "Error: " . mysqli_error($conn);
		}
		else{
			echo "<b class='text-danger bg-light'>Không thể xóa tài khoản đang sử dụng</b>";
		}
	}
?>
<style type="text/css" media="screen">
	th h4 b{
		color: #cc5200;
	}
	tr{
		background-color: #fff5cc;
	}
	#th{
		background-color: #ffd11a;
	}
	#footer{
		background-color: #ffe680;
	}
</style>
<form action="" method="post">
	<div class="pt-2 tieuDe mb-4 text-center">
		<h3><b>XÓA TÀI KHOẢN</b></h3>	
	</div>
	<table class="table">
		<tr>
			<td>Tài khoản</td>
			<td><input class="form-control" type="text" disabled="disabled" name="user" value="<?php echo $user; ?>"></td>
		</tr>
		<tr>
			<td>Mật khẩu</td>
			<td><input class="form-control" type="text" name="pass" value="<?php echo $pass; ?>"></td>
		</tr>
		<tr>
			<td>Họ và tên</td>
			<td><input class="form-control" type="text" name="ten" value="<?php echo $ten; ?>"></td>
		</tr>
		<tr>
			<td>Giới tính</td>
			<td>
				<input type="radio" name="gioitinh" value="Nam" 
				<?php 
					if ($gioitinh == 'Nam') {
						echo 'checked="checked"';
					} 
				?>>Nam
				<input type="radio" name="gioitinh" value="Nữ" 
				<?php 
					if ($gioitinh == 'Nữ') {
						echo 'checked="checked"';
					} 
				?>>Nữ
			</td>
		</tr>
		<tr>
			<td>Ngày sinh</td>
			<td><input class="form-control" type="text" name="ngaySinh" value="<?php echo $ngaySinh; ?>"></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><input class="form-control" type="text" name="level" value="<?php echo $level; ?>"></td>
		</tr>

		<tr id="footer">
			<td colspan="2" class="text-center"><input class="btn btn-danger" type="submit" name="submit" value="Xóa"></td>
		</tr>
	</table>
	<a href="?url=danhSachTK">Quay lại</a>
</form>