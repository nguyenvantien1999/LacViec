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

		$check = 0;
		$query = 'select distinct Ma_khach_hang from hoa_don';
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);		
		if($count!=0)
		{
			while($rows=mysqli_fetch_row($result))
			{
				if ($id == $rows[0]) {
					$check = 1;
				}
			}
		}

		if ($check != 1) {
			$sql='delete from khach_hang 
			where Ma_khach_hang = "'.$id.'" 
			and Ma_khach_hang not in 
			(select distinct Ma_khach_hang from hoa_don)'; 

			if (mysqli_query($conn, $sql)){
				echo "<b class='text-success bg-light'>Xóa thành công</b>";
			}
			else echo "<b class='text-danger bg-light'>Xóa thất bại</b>";
		}
		else echo "<b class='text-danger bg-light'>Không thể xóa khách hàng trong đơn đặt hàng</b>";
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
	<table class="table table-hover">
		<tr id="th"><th colspan="2"><h4 class="text-center"><b>XÓA THÔNG TIN KHÁCH HÀNG</b></h4></th></tr>
		<tr>
			<td>Mã khách hàng</td>
			<td><?php echo $id; ?></td>
		</tr>
		<tr>
			<td>Tên khách hàng</td>
			<td><?php echo $tenkh; ?></td>
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
			<td><?php echo $diachi; ?></td>
		</tr>
		<tr>
			<td>Điện thoại</td>
			<td><?php echo $dienthoai; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr id="footer">
			<td colspan="2" class="text-center"><input class="btn btn-danger" type="submit" name="submit" value="Xóa"></td>
		</tr>
	</table>
	<a href="?url=c6b12	">Quay lại</a>
</form>
