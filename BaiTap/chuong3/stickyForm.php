<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		else {
			$name = "";
		}
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		else {
			$email = "";
		}

		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		else {
			$gender = "";
		}

		if (isset($_POST['age'])) {
			$age = $_POST['age'];
		}
		else{
			$age = "";
		}

		if (isset($_POST['cmt'])) {
			$cmt = $_POST['cmt'];
		}
		else{
			$cmt = "";
		}
	 ?>
	<form action="" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Enter your information in the form</legend>
			<b>Name: </b><input type="text" name="name" value="<?php  echo $name;?>"><br> <br>
			<b>Email address: </b> <input type="text" name="email" value="<?php  echo $email;?>"><br> <br>
			<b>Gender: </b> <input type="radio" name="gender" value="nam" checked="true" 
								<?php if(isset($_POST['gender'])&&$_POST['gender']=="nam")
							echo 'checked="checked"'; ?>> Male

			<input type="radio" name="gender" value="nu" <?php if(isset($_POST['gender'])&&$_POST['gender']=='nu')
			echo 'checked="checked"'; ?>> Female <br> <br>
			
			<b>Age</b> <select name="age" >
				<option value="duoi30" <?php if(isset($_POST['age'])&& $_POST['age']=='duoi30') echo 'selected="selected"';?>>
					Under 30
				</option>
				<option value="bang30" <?php if(isset($_POST['age'])&&$_POST['age']=='bang30') echo 'selected="selected"';?>>
					30
				</option>}
				<option value="tren30" <?php if(isset($_POST['age'])&&$_POST['age']=='tren30') echo 'selected="selected"';?>>
					Above 30
				</option>}
				option
			</select> <br> <br>
			<b>Comment: </b> <textarea name="cmt" rows="3" cols="40"><?php  echo $cmt;?></textarea>
		</fieldset>
		<br>
		<input type="submit" name="submit" value="Submit My Information">
	</form>

	<?php 
		echo "<h2>";
		echo "Chào mừng đến với trang web<br>";
		echo "Thông tin của mày là<br>";
		echo "Tên mày là: ". $name. "<br>";
		echo "Tuổi của mày là: ". $age. "<br>";
		echo "Email: ". $email. "<br>";
		echo "Giới tính: ";
			if ($gender == 'nu') {
				echo "Nữ <br>";
			}
			else
				echo "Nam<br>";
		echo "nhận xét: ". $cmt. "<br>";
		echo "</h2>";
	 ?>
	
</body>
</html>