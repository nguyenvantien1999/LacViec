<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$id = $_GET['id'];
$sql="select Ten_sua,Trong_luong,Don_gia, Hinh, TP_Dinh_Duong, Loi_ich from sua where Ma_sua = '$id'";
$result = mysqli_query($conn, $sql);

echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";

if(mysqli_num_rows($result) <> 0)
{ 	
	while($rows=mysqli_fetch_row($result))
	{ 
		echo "<tr>
				<th width=\"50\" colspan=\"5\"><b>$rows[0]</b></th>
			</tr><tr>";	
		echo "<td width='100px'>
				<img src=\"BaiTap/chuong6/Hinh_sua/$rows[3]\" width='100px' height='auto'/>
			</td>";
		echo "<td>
				<b>Thành phần dinh dưỡng:</b>
				<p>$rows[4]</p>
				<b>Lợi ích:</b>	
				<p>$rows[5]</p>
				<div style='text-align: right'>
					<b>Trọng lượng:</b> $rows[1] - <b>Đơn giá: </b> $rows[2]
				</div>
			</td>";

	}//while
	echo "</tr>";
}
echo "<tr>
	<td><a href=\"javascript:window.history.back(-1);\">Quay về</a></td>
</tr>";
echo "</table>";
?>

