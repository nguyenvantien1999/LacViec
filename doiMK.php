<?php
	include 'header.inc'; 
	$err = "";
	if (isset($_POST['ok'])) {
		$passOld = $_POST['passOld'] ?? "";
		$pass = $_POST['pass'] ?? "";
		$pass2 = $_POST['pass2'] ?? "";

		$user = $_SESSION['username'];
		$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
		mysqli_set_charset($conn, 'UTF8');
		$sql="select password from user where username ='$user'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) <> 0)
		{ 	
			while($rows=mysqli_fetch_row($result))
			{
				if ($passOld == $rows[0]) {
					if ($pass == $pass2) {
						$sqlDMK='update user set password = "'.$pass.'"where username = "'.$user.'"';
						if (mysqli_query($conn, $sqlDMK)){
							$err = "<b class='text-success bg-light'>Cập nhật thành công</b>";
						}
						else $err = "<b class='text-danger bg-light'>Cập nhật thất bại</b>";
					}
					else
						$err = "Mật khẩu mới không khớp";
				}
				else{
					$err = "Mật khẩu cũ không chính xác";
				}
			}
		}
	}
?>
<div class="container mb-5 text-light">
	<form action="" method="post" accept-charset="utf-8">
		<div class="pt-2 tieuDe mb-4 text-center">
			<h3><b>ĐỔI MẬT KHẨU</b></h3>	
		</div>
		<table style="margin: 0 auto;">
			<tr>
				<td class="text-danger" colspan="2"><b><?php echo "$err"; ?></b></td>
			</tr>
			<tr>
				<td><b>Password cũ:</b></td>
				<td><input type="password" name="passOld" class="form-control" /></td>
			</tr>
			<tr>
				<td><b>Password mới:</b></td>
				<td><input type="password" name="pass" class="form-control"/></td>
			</tr>
			<tr>
				<td><b>Nhập lại password mới:</b></td>
				<td><input type="password" name="pass2" class="form-control"/></td>
			</tr>
			<tr>
				<td class="pt-1" colspan="2" style="text-align: center;">
					<input class="btn btn-info" type="submit" name="ok" value="Đổi mật khẩu"/>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php 
	include 'footer.inc';
?>