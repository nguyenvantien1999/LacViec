<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang";
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th width="50">STT</th>
<th width="50">Mã khách hàng</th>
<th width="1000">Tên khách hàng</th>
<th width="200">Phái</th>
<th width="1000">Địa chỉ</th>
<th width="200">Địên thoại</th>
<th width="200">Email</th>
</tr>';
if(mysqli_num_rows($result) <> 0)
{ 
	$stt=1;
	while($rows=mysqli_fetch_row($result))
	{ 

		if ($stt % 2 != 0) {
			$tr = 	"<tr style='background-color: #eefefe' >";
		}
		else{
			$tr = 	"<tr style='background-color: white' >";
		}

		echo $tr;
		echo "<td>$stt</td>";
		echo "<td>$rows[0]</td>";
		echo "<td>$rows[1]</td>";
		echo "<td>$rows[2]</td>";
		echo "<td>$rows[3]</td>";
		echo "<td>$rows[4]</td>";
		echo "<td>$rows[5]</td>";
		echo "</tr>";
		$stt+=1;
	}//while
}
echo "</table>";
?>


