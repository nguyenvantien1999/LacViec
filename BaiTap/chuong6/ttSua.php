<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ma_sua,ten_sua,Trong_luong,Don_gia from sua";
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5'> THÔNG TIN SỮA</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th width="50">STT</th>
<th width="50">Mã sữa</th>
<th width="150">Tên sữa</th>
<th width="200">Trọng lượng</th>
<th width="200">Giá</th>
</tr>';
if(mysqli_num_rows($result) <> 0)
{ 
	$stt=1;
	// while($rows=mysqli_fetch_row($result))
	// { 
	// 	echo "<tr>";
	// 	echo "<td>$stt</td>";
	// 	echo "<td>$rows[0]</td>";
	// 	echo "<td>$rows[1]</td>";
	// 	echo "<td>$rows[2]</td>";
	// 	echo "<td>$rows[3]</td>";
	// 	echo "</tr>";
	// 	$stt+=1;
	// }//while

	while($rows=mysqli_fetch_array($result))
	{ 
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>{$rows['Ma_sua']}</td>";
		echo "<td>{$rows['ten_sua']}";
		echo "<td>{$rows['Trong_luong']}</td>";
		echo "<td>{$rows['Don_gia']}</td>";
		echo "</tr>";
		$stt+=1;
	}//while
}
?>