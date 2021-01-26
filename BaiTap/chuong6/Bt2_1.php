<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ma_hang_sua,Ten_hang_sua,Dia_chi,Dien_thoai,Email from hang_sua";
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5'> THÔNG TIN HÃNG SỮA</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th width="50">STT</th>
<th width="50">Mã hãng sữa</th>
<th width="150">Tên hãng sữa</th>
<th width="500">Địa chỉ</th>
<th width="200">Điện thoại</th>
<th width="200">Email</th>
</tr>';
if(mysqli_num_rows($result) <> 0)
{ 
	$stt=1;
	while($rows=mysqli_fetch_row($result))
	{ 
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>$rows[0]</td>";
		echo "<td>$rows[1]</td>";
		echo "<td>$rows[2]</td>";
		echo "<td>$rows[3]</td>";
		echo "<td>$rows[4]</td>";
		echo "</tr>";
		$stt+=1;
	}//while
}
echo "</table>";
?>