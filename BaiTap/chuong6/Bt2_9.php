<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
else{
	$id ="#";
}
$sql="select Ten_sua,Trong_luong,Don_gia, Hinh, TP_Dinh_Duong, Loi_ich from sua where Ten_sua like '%$id%'";
$result = mysqli_query($conn, $sql);

echo "";
echo "<form action=\"\" method=\"get\" accept-charset=\"utf-8\">
		<div style='text-align: center; background-color: pink'>
			<p align='center'><font size='5'> TÌM KIẾM THÔNG TIN SỮA</font></p>
			<b>Tên sữa: </b><input type=\"text\" name=\"id\">
			<input type=\"text\" name=\"url\" value=\"c6b9\" hidden=\"true\">
			<input type=\"submit\" value=\"Tìm kiếm\">
		</div>
	</form>";

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
			</td>";

	}//while
	echo "</tr>";
}

echo "</table>";
?>
