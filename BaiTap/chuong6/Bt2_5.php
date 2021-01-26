<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$sql="select Ten_sua,Ten_hang_sua,Ten_loai,Trong_luong,Don_gia, Hinh from sua, loai_sua, hang_sua where 
	sua.Ma_loai_sua = loai_sua.Ma_loai_sua AND sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
$result = mysqli_query($conn, $sql);

echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th width="50" colspan="2"><b>THÔNG TIN CÁC SẢN PHẨM</b></th>

</tr>';
if(mysqli_num_rows($result) <> 0)
{ 
	$stt=1;
	while($rows=mysqli_fetch_row($result))
	{ 
		echo "<td style=\"text-align: center\">";
			echo "<img src=\"BaiTap/chuong6/Hinh_sua/$rows[5]\" width='100px' height='auto'/>";
		echo "</td>";
		echo "<td>";
			echo "<b>$rows[0]</b><br>
				Nhà sản xuất: $rows[1]<br>
				$rows[2] - $rows[3]gr - $rows[4]VNĐ";
		echo "</td>";
		echo "</tr>";
		$stt+=1;
	}//while
}
echo "</table>";
?>

