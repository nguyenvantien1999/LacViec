<div class="pt-2 tieuDe mb-4 text-center">
	<h3><b>DANH SÁCH TÀI KHOẢN</b></h3>	
</div>
<table class="table">
	<tr class="border-0 badge-danger">
		<th>Tài khoản</th>
		<th>Mật khẩu</th>
		<th>Họ và tên</th>
		<th>Giới tính</th>
		<th>Ngày sinh</th>
		<th>Ảnh</th>
		<th>Level</th>
		<th class="text-success"><i class="fa fa-pencil" aria-hidden="true"></i></th>
		<th class="text-warning"><i class="fa fa-trash" aria-hidden="true"></i></i></th>
	</tr>
	<?php 
		$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
		mysqli_set_charset($conn, 'UTF8');

		$sql='select * from user'; 

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
					<td><?php echo $rows['username'] ?></td>
					<td><?php echo $rows['password'] ?></td>
					<td><?php echo $rows['ho_ten'] ?></td>
					<td><?php echo $rows['gioi_tinh'] ?></td>
					<td><?php echo $rows['ngaySinh'] ?></td>
					<td class="">
						<?php 
							$srcAnh = "anh/avatar/". $rows['anh'];
						?>
						<img class="img-fluid img-thumbnail" src="<?php echo $srcAnh ?>" width="50px" height="auto">
					</td>
					<td><?php echo $rows['level'] ?></td>
					<td><a href="?url=suaTK&id=<?php echo $rows['username']; ?>">Sửa</a></td>
					<td><a class="text-danger" href="?url=xoaTK&id=<?php echo $rows['username']; ?>">Xóa</a></td>
				</tr>
	<?php
			}
		}
		else echo "Không có dữ liệu.<br>";
	?>
</table>