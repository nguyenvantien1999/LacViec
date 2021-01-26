<?php 
	include 'header.inc';
?>
<div class="pt-2 tieuDe container">
	<h3 class=""><b>Truyện</b></h3>	
</div>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
	mysqli_set_charset($conn, 'UTF8');
	if (isset($_GET['id'])) {
		$maTK = $_GET['id'];
	}
	else{
		$maTK = "#";
	}
	
	if (isset($_GET['search'])) {
		$search = $_GET['search'];
	}
	else{
		$search = "#";
	}
	
	$sql="select tentruyen, hinh, noidung from truyen where matd like '$maTK' or matl like '$maTK' or tentruyen like '%$search%'";
	$result = mysqli_query($conn, $sql);
	echo "<br><div class='container'>";
	echo "<div class='row'>";
	$flag = false;
	if(mysqli_num_rows($result) <> 0)
	{ 	$tong = 0;
		while($rows=mysqli_fetch_row($result))
		{ 
			echo "<div class='col-3'>";	
			echo "<h4 class='titleVD' style='text-align: center;'>$rows[0]</h4>
				<a href=\"truyen/$rows[2]\"><img class=\"img-fluid\" src=\"anh/truyen/$rows[1]\"></a><hr>";
			echo "</div>";
			$flag = true;
			$tong++;
			if ($tong == 4) {
				echo "</div>";
				echo "<div class='row'>";
				$tong = 0;
			}
		}
	}
	echo "</div>";
	if ($flag == false) {
		echo "<div class='text-light'><h4 class='text-center'>Không có thông tin tìm kiếm</h4></div>";
	}
	echo "</div>";
?>

<div class="pt-2 tieuDe container">
	<h3><b>Video</b></h3>	
</div>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
	mysqli_set_charset($conn, 'UTF8');
	$sql="select tenvd, link from video where matd = '$maTK' or tenvd like '%$search%'";
	$result = mysqli_query($conn, $sql);
	$flag = false;
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
			$flag = true;
			$tong++;
			if ($tong == 4) {
				echo "</div>";
				echo "<div class='row'>";
				$tong = 0;
			}
		}
	}
	echo "</div>";
	if ($flag == false) {
		echo "<div class='text-light'><h4 class='text-center'>Không có thông tin tìm kiếm</h4></div>";
	}
	echo "</div>";
?>
<?php
	include 'footer.inc';
?>


