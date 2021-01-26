<?php
	session_start();

	$now = time();
	if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
	    // this session has worn out its welcome; kill it and start a brand new one
	    session_unset();
	    session_destroy();
	    session_start();
	    header("Location:dangnhap.php"); 
	}

	// either new or old, it should live at most for another hour
	$_SESSION['discard_after'] = $now + 1800;

	if(isset($_POST['dangxuat']))
		if (isset($_SESSION['username']))
    		unset($_SESSION['username']);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lạc Việt | Cội nguồn dân tộc</title>
	<link rel="shortcut icon" type="image/png" href="anh/logo1.png"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
	<script src="bootstrap/popper.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
	<script src="bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header id="header">

		<div id="logo">
			<div class="p-2 container">
				<div class="row ml-2">
					<div>
						<img id="imgLg" src="anh/logo1.png">
					</div>
					<div>
						<h3 class="pt-4 text-light">LACVIET<span class="text-success">.com</span></h3>
						<p class="text-info"><i>Nhớ về cội nguồn dân tộc</i></p>
					</div>
					<div class="form-inline ml-4">
						<?php 
							echo "<form action=\"timkiem.php\" method=\"get\" accept-charset=\"utf-8\">
								<input id=\"search\" type=\"text\" name=\"search\" class=\"form-control text-light ml-3\" size=\"40\" placeholder=\"Tìm: tên truyện, tên video, tác giả\">
								<button id=\"searchIp\" class=\"btn btn-dark\" type=\"submit\"><i class=\"fa fa-search\"></i></button>  
							</form>";
						?>
					</div>	
					<div>
						<audio class="mt-4 ml-4 audio d-none d-xl-block" src="audio/HKVN.mp3" controls></audio>
					</div>
				</div>
			</div> 		
		</div>	

		<div id="nav">
			<nav class="navbar navbar-expand-sm navbar-dark container">
	
				<ul class="navbar-nav">

					<li class="nav-item">
						<a class="nav-link" href="index.php">TRANG CHỦ</a>
					</li>	
					<?php
						if (isset($_SESSION['username'])){
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"profile.php\">PROFILE</a>
							</li>";
							if ($_SESSION['level'] == 1) {
								echo "<li class=\"nav-item\">
									<a class=\"nav-link\" href=\"quanLyTK.php?url=danhSachTK\">QUẢN LÝ TÀI KHOẢN</a>
								</li>";
							}
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"baitap.php\">BÀI TẬP</a>
							</li>";
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"vietlot.php\">SỔ XỐ VIETLOT</a>
							</li>";
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"59132605_De2.php\">BÀI THI</a>
							</li>";
							echo "<li class=\"nav-item\">
								<form action=\"index.php\" method=\"post\" accept-charset=\"utf-8\">
									<input class=\"btn btn-dark\" type=\"submit\" name=\"dangxuat\" value=\"ĐĂNG XUẤT\">
								</form>
							</li>";
						}
						else{
							echo "<li class=\"nav-item dropdown\">
								<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">
								THỂ LOẠI
								</a>
								<div class=\"dropdown-menu\">";
									$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
									mysqli_set_charset($conn, 'UTF8');
									$sql="select tentl, matl from theloai";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) <> 0)
									{ 	
										while($rows=mysqli_fetch_row($result))
										{ 
											echo "<a class='dropdown-item' href='timkiem.php?id=$rows[1]'>$rows[0]</a>";
										}
									}
									
								echo "</div>
								</li>";

							echo "<li class=\"nav-item dropdown\">
								<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">
								TRIỀU ĐẠI
								</a>
								<div class=\"dropdown-menu\">";
									$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
									mysqli_set_charset($conn, 'UTF8');
									$sql="select tentd, matd from trieudai";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) <> 0)
									{ 	
										while($rows=mysqli_fetch_row($result))
										{ 
											echo "<a class='dropdown-item' href='timkiem.php?id=$rows[1]'>$rows[0]</a>";
										}
									}
								echo "</div>
								</li>";

							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"video.php\">VIDEO</a>
							</li>";
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"lienHe.php\">LIÊN HỆ</a>
							</li>";
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"thongtin.php\">THÔNG TIN</a>
							</li>";
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"dangnhap.php\">ĐĂNG NHẬP</a>
							</li>";
						}
					?>
				</ul>
			</nav>
		</div>
	</header><!-- /header -->
