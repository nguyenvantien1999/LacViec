<?php 
	include 'header.inc';
	use PHPMailer\PHPMailer\PHPMailer;

	$err = "";
	if (isset($_POST['submit'])) {

		$hoTen = $_POST['hoTen'];
		$email = $_POST['email'];
		$tieuDe = $_POST['tieuDe'];
		$cmt = $_POST['mess'];

		if ($hoTen == "" || $email == "" || $tieuDe == "" || $cmt == "") {
			$err = "<b class='text-danger bg-light'>Bạn chưa nhập đầy đủ thông tin !!!</b>";
		}
		else{
			require_once "../../Emailer/PHPMailer.php";
			require_once "../../Emailer/SMTP.php";
			require_once "../../Emailer/Exception.php";

			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com'; 
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'tien.nv.59cntt@ntu.edu.vn';                     // SMTP username
		    $mail->Password   = 'tienvan2';
		    $mail->Port       = 587;
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 


		    $content = "Họ tên:\t$hoTen<br> 
		    			Email:\t$email<br>
		    			Tiêu đề:\t$tieuDe<br>
		    			Nội dung:\t$cmt";
		    $mail->isHTML(true); 
		    $mail->setFrom($email, $hoTen);
		    $mail->Subject = $tieuDe;
		    $mail->Body    = $content;
		    $mail->addAddress("tien.nv.59cntt@ntu.edu.vn");

		    if ($mail->send()) {
		    	$err ="<b class='text-success bg-light'>Gửi thành công</b>";
		    }
		    else{
		    	$err = "<b class='text-danger bg-light'>Gửi thất bại</b>";
		    }
		}
	}
?>
<link rel="stylesheet" type="text/css" href="css/lienhe.css">
<div class="container mb-5">
	<div class="row">
		<div class="col-6">
			<form action="" method="post" accept-charset="utf-8">
				<div id="title" class="mb-3">
					<h3 class="mt-3"><b><i>GỬI THÔNG TIN LIÊN HỆ</i></b></h3>
				</div>
				
				<table class="text-light">
					<tr>
						<td>Họ tên: </td>
						<td><input type="text" class="form-control" name="hoTen"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="email" class="form-control" name="email"></td>
					</tr>
					<tr>
						<td>Tiêu đề: </td>
						<td><input type="text" class="form-control" name="tieuDe"></td>
					</tr>
					<tr>
						<td>Nội dung: </td>
						<td><textarea name="mess" class="form-control"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="btn btn-success" type="submit" name="submit" value="Gửi">
							<input type="reset" class="btn btn-danger" name="reset" value="Xóa">
						</td>
					</tr>
					<?php 
						echo "$err";
					?>
				</table>
			</form>
		</div>
		<div class="col-6 mt-3">
			<img src="anh/lienhe.jpg" class="img-fluid img-thumbnail" alt="">
		</div>
	</div>
</div>
<?php 
	include 'footer.inc';
?>