<?php 
	include 'header.inc';
?>
<link rel="stylesheet" type="text/css" href="css/video.css">
<div class="pt-2 tieuDe container">
	<h3 class=""><b>Video</b></h3>	
</div>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
	mysqli_set_charset($conn, 'UTF8');

	$rowsPerPage=10; //số mẩu tin trên mỗi trang
	if (!isset($_GET['page']))
	{ 
		$_GET['page'] = 1;
	}
	//vị trí của mẩu tin đầu tiên trên mỗi trang
	$offset =($_GET['page']-1)*$rowsPerPage;
	//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
	$result = mysqli_query($conn, 'SELECT tenvd, link FROM video LIMIT '. $offset . ', ' .$rowsPerPage);
	$sql="select tenvd, link from video";
	echo "<br><div class='container'>";
	echo "<div class='row'>";
	if(mysqli_num_rows($result) <> 0)
	{ 	$tong = 0;
		while($rows=mysqli_fetch_row($result))
		{ 
			echo "<div class='col-6'>";	
			echo "<h4 class='titleVD' style='text-align: center;'>$rows[0]</h4>
				<div class=\"embed-responsive embed-responsive-16by9\">
					$rows[1]
				</div><hr>";
			echo "</div>";

			$tong++;
			if ($tong == 4) {
				echo "</div>";
				echo "<div class='row'>";
				$tong = 0;
			}
		}
	}
	echo "</div></div>";

	$re = mysqli_query($conn, 'select * from video');
	//tổng số mẩu tin cần hiển thị
	$numRows = mysqli_num_rows($re);
	//tổng số trang
	$maxPage = floor($numRows/$rowsPerPage) + 1;
	echo "<p style='text-align: center;'>";

	//gắn thêm nút Back
	if ($_GET['page'] > 1){
		echo "<a href=". $_SERVER['PHP_SELF']."?page=".(1)."><< </a>";
		echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> <</a> "; 
	}
	//tạo link tương ứng tới các trang
	for ($i=1 ; $i<=$maxPage ; $i++)
	{ 
		if ($i == $_GET['page'])
		{ 
			echo '<b>Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
		}
		else
			echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">Trang".$i."</a> ";
	}
	//gắn thêm nút Next
	if ($_GET['page'] < $maxPage)
	{
		echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">> </a>";
		echo "<a href=". $_SERVER['PHP_SELF']."?page=".($maxPage)."> >></a>";
	}
	 
	echo "</p>";

	include 'footer.inc';
?>


