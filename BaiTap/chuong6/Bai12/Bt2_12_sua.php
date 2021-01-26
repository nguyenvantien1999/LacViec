<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
	mysqli_set_charset($conn, 'UTF8');

	$id = $_GET['id'] ?? "";
	$tenkh = "";
	$gioitinh = "";
	$diachi = "";
	$dienthoai = "";
	$email = "";

	$query='select * from khach_hang where Ma_khach_hang = "'.$id.'"';
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result) != 0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$tenkh = $row['Ten_khach_hang'];
			$gioitinh = $row['Phai'];
			$diachi = $row['Dia_chi'];
			$dienthoai = $row['Dien_thoai'];
			$email = $row['Email'];
		}
	}
	mysqli_free_result($result);

	if (isset($_POST['submit'])) {
		$tenkh = $_POST['tenkh'] ?? "";
		$gioitinh = $_POST['gioitinh'] ?? "";
		$diachi = $_POST['diachi'] ?? "";
		$dienthoai = $_POST['dienthoai'] ?? "";
		$email = $_POST['email'] ?? "";

		$sql='update khach_hang set 
			Ten_khach_hang = "'.$tenkh.'", 
			Phai = '.$gioitinh.', 
			Dia_chi = "'.$diachi.'", 
			Dien_thoai = "'.$dienthoai.'", 
			Email = "'.$email.'" 
			where Ma_khach_hang = "'.$id.'"'; // select * thi xai fetch_array

		if (mysqli_query($conn, $sql)){
			echo "<b class='text-success bg-light'>Cập nhật thành công</b>";
		}
		else echo "<b class='text-danger bg-light'>Cập nhật thất bại</b>";
		//else echo "Error: " . mysqli_error($conn);
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
	<table class="table">
		<tr id="th"><th colspan="2" class="text-center"><h4><b>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</b></h4></th></tr>
		<tr>
			<td>Mã khách hàng</td>
			<td><input class="form-control" type="text" disabled="disabled" name="makh" value="<?php echo $id; ?>"></td>
		</tr>
		<tr>
			<td>Tên khách hàng</td>
			<td><input class="form-control" type="text" name="tenkh" value="<?php echo $tenkh; ?>"></td>
		</tr>
		<tr>
			<td>Giới tính</td>
			<td>
				<input type="radio" name="gioitinh" value="0" 
				<?php 
					if ($gioitinh == 0) {
						echo 'checked="checked"';
					} 
				?>>Nam
				<input type="radio" name="gioitinh" value="1" 
				<?php 
					if ($gioitinh == 1) {
						echo 'checked="checked"';
					} 
				?>>Nữ
			</td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input class="form-control" type="text" name="diachi" value="<?php echo $diachi; ?>"></td>
		</tr>
		<tr>
			<td>Điện thoại</td>
			<td><input class="form-control" type="text" name="dienthoai" value="<?php echo $dienthoai; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input class="form-control" type="email" name="email" value="<?php echo $email; ?>"></td>
		</tr>
		<tr id="footer">
			<td colspan="2" class="text-center"><input class="btn btn-success" type="submit" name="submit" value="Cập nhật"></td>
		</tr>
	</table>
	<a href="?url=c6b12">Quay lại</a>
</form>
