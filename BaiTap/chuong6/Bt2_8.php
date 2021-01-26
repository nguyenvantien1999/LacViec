<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');

$rowsPerPage=2; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)*$rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset

$result = mysqli_query($conn, 'SELECT Ten_sua,Trong_luong,Don_gia, Hinh, TP_Dinh_Duong, Loi_ich FROM sua LIMIT '. $offset . 
	', ' .$rowsPerPage);

$sql="select Ten_sua,Trong_luong,Don_gia, Hinh, TP_Dinh_Duong, Loi_ich from sua ";


echo "<p align='center'><font size='5'> THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>

</tr>';
if(mysqli_num_rows($result) <> 0)
{ 	
	while($rows=mysqli_fetch_row($result))
	{ 
		echo "<tr>
				<th width=\"50\" colspan=\"5\"><b>$rows[0]</b></th>
			</tr><tr>";	
		echo "<td width='100px'>
				<img src=\"BaiTap/Chuong6/Hinh_sua/$rows[3]\" width='100px' height='auto'/>
			</td>";
		echo "<td>
				<b>Thành phần dinh dưỡng:</b>
				<p>$rows[4]</p>
				<b>Lợi ích:</b>	
				<p>$rows[5]</p>
				<div style='text-align: center'>
					<b>Trọng lượng:</b> $rows[1] - <b>Đơn giá: </b> $rows[2]
				</div>
			</td>";

	}//while
	echo "</tr>";
}
echo "</table>";
$re = mysqli_query($conn, 'select * from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;
echo "<p style='text-align: center;'>";

//gắn thêm nút Back
if ($_GET['page'] > 1){
	echo "<a href=". $_SERVER['PHP_SELF']."?url=c6b8&page=".(1)."><<</a>";
	echo "<a href=" .$_SERVER['PHP_SELF']."?url=c6b8&page=".($_GET['page']-1)."><</a> "; 
}
//tạo link tương ứng tới các trang
for ($i=1 ; $i<=$maxPage ; $i++)
{ 
	if ($i == $_GET['page'])
	{ 
		echo '<b>Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
	}
	else
		echo "<a href=" .$_SERVER['PHP_SELF']. "?url=c6b8&page=".$i.">Trang".$i."</a> ";
}
//gắn thêm nút Next
if ($_GET['page'] < $maxPage)
{
	echo "<a href=". $_SERVER['PHP_SELF']."?url=c6b8&page=".($_GET['page']+1).">></a>";
	echo "<a href=". $_SERVER['PHP_SELF']."?url=c6b8&page=".($maxPage).">>></a>";
}
 
echo "</p>";
?>

