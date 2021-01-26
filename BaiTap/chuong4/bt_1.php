<?php 
	$arr = [];
	$n = 0;
	if (isset($_POST['n'])) {
		$n = $_POST['n'];
	}
	function mangNN(){
		global $n;
		global $arr;
		for($i = 0; $i < $n; $i++){
			$arr[$i] = rand(-1000,1000);
		}
		for($i = 0; $i < $n; $i++){
			echo $arr[$i]. ", ";
		}
	}
	function demSoChan(){
		global $arr;
		$dem = 0;
		for($i = 0; $i < sizeof($arr); $i++){
			if ($arr[$i] % 2 == 0) {
				$dem++;
			}
		}
		echo $dem;
	}
	function demBeHon100(){
		global $arr;
		$dem100 = 0;
		for($i = 0; $i < sizeof($arr); $i++){
			if ($arr[$i] < 100) {
				$dem100++;
			}
		}
		echo $dem100;
	}
	function tinhTongAm(){
		global $arr;
		$tong = 0;
		for($i = 0; $i < sizeof($arr); $i++){
			if ($arr[$i] < 0) {
				$tong += $arr[$i];
			}
		}
		echo $tong;
	}
	function viTri0(){
		global $arr;
		$viTri = [];
		for($i = 0; $i < sizeof($arr); $i++){
			if ($arr[$i] == 0) {
				array_push($viTri, $i + 1);
			}
		}
		if (sizeof($viTri) == 0) {
			echo "không có 0 trong mảng";
		}
		else{
			for ($i=0; $i < sizeof($viTri); $i++) { 
				echo $viTri[$i]. ", ";
			}
		}	
	}
	function sortMang(){
		global $arr;
		sort($arr);
		for($i = 0; $i <sizeof($arr); $i++){
			echo $arr[$i]. ", ";
		}
	}
	echo "<form class='form-inline' action='' method='post' accept-charset='utf-8'>";
		echo "<input class='form-control' type='text' name='n'>";
		echo "<input class='btn btn-success' type='submit' value='Nhập số phần tử trong mảng:'></form>";

	if (isset($_POST['n'])) {
		echo "Mảng là: ", mangNN();
		echo "<br>Mảng có ", demSoChan() ," số chẵn\n";
		echo "<br>Mảng có ", demBeHon100(), " số bé hơn 100";
		echo "<br>Tổng các số âm trong mảng là: ", tinhTongAm();
		echo "<br>Vị trí các số 0 trong mảng: ", viTri0();
		echo "<br>Sắp xếp mảng tăng dần: ", sortMang();
	}
 ?>