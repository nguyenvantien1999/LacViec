<html>
	<body>
		<h1>Tìm sách</h1>
		<form action="timSach.php" Method="GET" >
			Từ khóa : <input type="text" name="txtTukhoa"/>
			<input type="submit" value="Tìm"/>
		</form>
		<?php
			$sTukhoa = $_REQUEST["txtTukhoa"];
			if (isset($sTukhoa))
			{
				print "Từ khóa tìm sách là :
				$sTukhoa";
				echo "<br>Kết quả tìm là : ";
			}
		?>
	</body>
</html>