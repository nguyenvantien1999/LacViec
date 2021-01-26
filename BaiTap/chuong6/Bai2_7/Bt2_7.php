<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ten_sua,Trong_luong,Don_gia, Hinh, Ma_sua from sua";
$result = mysqli_query($conn, $sql);

echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th width="50" colspan="5"><b>THÔNG TIN CÁC SẢN PHẨM</b></th>

</tr>';
if(mysqli_num_rows($result) <> 0)
{ 	$tong = 0;
	while($rows=mysqli_fetch_row($result))
	{ 
		echo "<td width='100px'>";
			echo "<a href=\"?url=c6b7_1&id=$rows[4]\"><b>$rows[0]</b></a><br>
				$rows[1]gr - $rows[2]VNĐ<br>
				<img src=\"BaiTap/chuong6/Hinh_sua/$rows[3]\" width='100px' height='auto'/>";
		echo "</td>";
		$tong++;
		if ($tong == 5) {
			echo "</tr>";
			$tong = 0;
		}
	}//while
	echo "</tr>";
}
echo "</table>";
?>

