<style type="text/css" media="screen">
	th{
		color: #e6005c;
	}
</style>
<table class="table table-hover">
	<tr><th colspan="8"><h4 class="text-center text-dark"><b>THÔNG TIN KHÁCH HÀNG</b></h4></th></tr>
	<tr>
		<th>Mã khách hàng</th>
		<th>Tên khách hàng</th>
		<th>Giới tính</th>
		<th>Địa chỉ</th>
		<th>Số điện thoại</th>
		<th>Email</th>
		<th class="text-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></th>
		<th class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></i></th>
	</tr>
	<?php 
		$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
		mysqli_set_charset($conn, 'UTF8');

		$sql='select * from khach_hang'; 

		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		
		if($count!=0)
		{
			$stt = 0;
			while($rows=mysqli_fetch_array($result))
			{
				if ($stt % 2 == 0) {
					echo 	"<tr style='background-color: #ffddcc' >";
				}
				else{
					echo	"<tr style='background-color: white' >";
				}
				$stt++;
	?>
					<td><?php echo $rows['Ma_khach_hang'] ?></td>
					<td><?php echo $rows['Ten_khach_hang'] ?></td>
					<td>
						<?php 
							$gioitinh = $rows['Phai'];
							if ($gioitinh == 1) {
								echo "Nữ";
							}
							else echo "Nam";
						?>
					</td>
					<td><?php echo $rows['Dia_chi'] ?></td>
					<td><?php echo $rows['Dien_thoai'] ?></td>
					<td><?php echo $rows['Email'] ?></td>
					<td><a href="?url=c6b12_1&id=<?php echo $rows['Ma_khach_hang']; ?>">Sửa</a></td>
					<td><a class="text-danger" href="?url=c6b12_2&id=<?php echo $rows['Ma_khach_hang']; ?>">Xóa</a></td>
				</tr>
	<?php
			}
		}
		else echo "Không có dữ liệu.<br>";
	?>
</table>
