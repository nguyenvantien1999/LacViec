<?php 
	include 'header.inc'; 
	$url = $_GET['url'] ?? "";
	echo "<div class='container'>";

	if ($url == 'danhSachTK') {
		include 'QLTK/danhSachTK.php';
	}
	if ($url == 'xoaTK') {
		include 'QLTK/xoaTK.php';
	}
	if ($url == 'suaTK') {
		include 'QLTK/suaTK.php';
	}
	echo "</div>";
	include 'footer.inc';
 ?>