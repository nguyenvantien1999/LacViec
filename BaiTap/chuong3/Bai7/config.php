<?php 
	if (isset($_POST['hoten'])) {
		$name = $_POST['hoten'];
	}
	else {
		$name = "";
	}
	if (isset($_POST['diachi'])) {
			$address = $_POST['diachi'];
	}
	else {
		$address = "";
	}

	if (isset($_POST['sdt'])) {
		$sdt = $_POST['sdt'];
	}
	else {
		$sdt = "";
	}

	if (isset($_POST['gioiTinh'])) {
		$gioiTinh = $_POST['gioiTinh'];
	}
	else{
		$gioiTinh = "";
	}

	if (isset($_POST['quocTich'])) {
		$quocTich = $_POST['quocTich'];
	}
	else{
		$quocTich = "";
	}

	if (isset($_POST['php&mysql'])) {
		$monHoc[0] = "PHP & MySQL";
	}
	else{
		$monHoc[0] = "";
	}
	if (isset($_POST['c#'])) {
		$monHoc[1] = "C#";
	}
	else{
		$monHoc[1] = "";
	}
	if (isset($_POST['xml'])) {
		$monHoc[2] = "XML";
	}
	else{
		$monHoc[2] = "";
	}
	if (isset($_POST['ghiChu'])) {
		$ghiChu = $_POST['ghiChu'];
	}
	else {
		$ghiChu = "";
	}

	echo "<h2>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h2>";
	echo "Họ tên: ". $name. "<br>";
	echo "Giới tính: ";
			if ($gioiTinh == 'nu') {
				echo "Nữ <br>";
			}
			else
				echo "Nam<br>";
	echo "Địa chỉ: ". $address. "<br>";
	echo "Số điện thoại: ". $sdt. "<br>";
	echo "Quốc tịch: ". $quocTich. "<br>";
	echo "Các môn mày đã đăng kí: ";
	for($i = 0; $i < 3; $i++){
		if ($monHoc[$i] != "") {
			echo $monHoc[$i]. ", ";
		}
		
	}
	echo "<br>Ghi chú: ". $ghiChu;

 ?>