<?php
	include 'header.inc'; 
	$arrChuong3 = ['Diện tích hình chữ nhật',
					'Diện tích và chu vi hình tròn',
					'Thanh toán tiền điện',
					'Kết quả thi đại học',
					'Tính tiền Karaoke',
					'Phép tính hai số',
					'Đăng ký môn học'];

	$arrChuong4 = ['Sử dụng hàm rand()',
					'Tính năm âm lịch',
					'Tính năm nhuận',
					'Nhập và tính trên dãy số',
					'Phát sinh mảng con và tính toán',
					'Tìm kiếm',
					'Thay thế',
					'Sắp xếp mảng',
					'Đếm phần tử, ghép mảng và sắp xếp',
					'Mua hoa'];

	$arrChuong5 = ['Chương trình quản lý nhân viên',
					'Phép tích trên phân số'];

	$arrChuong6 = ['Hiển thị lưới',
					'Lưới định dạng',
					'Lưới tùy biến',
					'Lưới phân trang',
					'List đơn giản',
					'List dạng cột',
					'List dạng cột có link',
					'List chi tiết có phân trang',
					'Tìm kiếm đơn giản',
					'Tìm kiếm nâng cao',
					'Thêm mới',
					'Xóa - sửa'];
?>
<link rel="stylesheet" type="text/css" href="css/baitap.css">
<div class="container">
	<div class="row">
		<div id="navBT" class="col-4 bg-dark">
			<form action="" method="POST" accept-charset="utf-8">
				<nav class="navbar" style="padding-bottom: 400px;">
					<div class="pt-1 tieuDe mb-4">
						<h3><b>DANH SÁCH BÀI TẬP</b></h3>	
					</div>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<h4 class="nav-link dropdown-toggle text-success" data-toggle="dropdown">
								<b><a class="text-success" href="#">PHP VÀ FORM</a></b>
							</h4>
						    <div class="dropdown-menu bg-light">
						    	<?php 
						    		for ($i=0; $i < sizeof($arrChuong3); $i++) { 
						    			$j = $i + 1;
						    			echo "<a class=\"dropdown-item\" href=\"?url=c3b$j\">
								      		<b>$j. $arrChuong3[$i]</b>
								      	</a>";
						    		}
						    	 ?>
						    </div>
						</li>
						<li class="nav-item">
						  	<h4 class="nav-link dropdown-toggle text-success" data-toggle="dropdown">
								<b><a class="text-success" href="#">MẢNG & CHUỖI</a></b>
							</h4>
						    <div class="dropdown-menu bg-light">
						    	<?php 
						    		for ($i=0; $i < sizeof($arrChuong4); $i++) { 
						    			$j = $i + 1;
						    			echo "<a class=\"dropdown-item\" href=\"?url=c4b$j\">
								      		<b>$j. $arrChuong4[$i]</b>
								      	</a>";
						    		}
						    	 ?>
						    </div>
						</li>
						<li class="nav-item">
						  	<h4 class="nav-link dropdown-toggle text-success" data-toggle="dropdown">
								<b><a class="text-success" href="#">HƯỚNG ĐỐI TƯỢNG</a></b>
							</h4>
						    <div class="dropdown-menu bg-light">
						    	<?php 
						    		for ($i=0; $i < sizeof($arrChuong5); $i++) { 
						    			$j = $i + 1;
						    			echo "<a class=\"dropdown-item\" href=\"?url=c5b$j\">
								      		<b>$j. $arrChuong5[$i]</b>
								      	</a>";
						    		}
						    	 ?>
						    </div>
						</li>
						<li class="nav-item">
						  	<h4 class="nav-link dropdown-toggle text-success" data-toggle="dropdown">
								<b><a class="text-success" href="#">MYSQL</a></b>
							</h4>
						    <div class="dropdown-menu bg-light">
						    	<?php 
						    		for ($i=0; $i < sizeof($arrChuong6); $i++) { 
						    			$j = $i + 1;
						    			echo "<a class=\"dropdown-item\" href=\"?url=c6b$j\">
								      		<b>$j. $arrChuong6[$i]</b>
								      	</a>";
						    		}
						    	 ?>
						    </div>
						</li>
					</ul>
				</nav>	
			</form>
		</div>
		<div id="webBT" class="col-8 bg-light">
			<h2 class="text-danger text-center mt-2">NỘI DUNG BÀI TẬP</h2>
			<hr>
			<?php
				if(isset($_GET['url'])) {
					switch ($_GET['url']) {
						// Chương 3
						case 'c3b1':
							include 'BaiTap/chuong3/bt_1.php';
							break;
						case 'c3b2':
							include 'BaiTap/chuong3/bt_2.php';
							break;
						case 'c3b3':
							include 'BaiTap/chuong3/bt_3.php';
							break;
						case 'c3b4':
							include 'BaiTap/chuong3/bt_4.php';
							break;
						case 'c3b5':
							include 'BaiTap/chuong3/bt_5.php';
							break;
						case 'c3b6':
							include 'BaiTap/chuong3/Bai6/bt_6NhapLieu.php';
							break;
						case 'c3b6_1':
							include 'BaiTap/chuong3/Bai6/bt_6KQ.php';
							break;
						case 'c3b7':
							include 'BaiTap/chuong3/Bai7/form.php';
							break;
						case 'c3b7_1':
							include 'BaiTap/chuong3/Bai7/config.php';
							break;
						// Chương 4
						case 'c4b1':
							include 'BaiTap/chuong4/bt_1.php';
							break;
						case 'c4b2':
							include 'BaiTap/chuong4/Bai2/bt_2.php';
							break;
						case 'c4b3':
							include 'BaiTap/chuong4/bt_3.php';
							break;
						case 'c4b4':
							include 'BaiTap/chuong4/bt_4.php';
							break;
						case 'c4b5':
							include 'BaiTap/chuong4/bt_5.php';
							break;
						case 'c4b6':
							include 'BaiTap/chuong4/bt_6.php';
							break;
						case 'c4b7':
							include 'BaiTap/chuong4/bt_7.php';
							break;
						case 'c4b8':
							include 'BaiTap/chuong4/Bai8/bt_8.php';
							break;
						case 'c4b9':
							include 'BaiTap/chuong4/bt_9.php';
							break;
						case 'c4b10':
							include 'BaiTap/chuong4/bt_10.php';
							break;
						// Chương 5
						case 'c5b1':
							include 'BaiTap/chuong5/bt_1.php';
							break;
						case 'c5b2':
							include 'BaiTap/chuong5/bt_2.php';
							break;
						// Chương 6
						case 'c6b1':
							include 'BaiTap/chuong6/Bt2_1.php';
							break;
						case 'c6b2':
							include 'BaiTap/chuong6/Bt2_2.php';
							break;
						case 'c6b3':
							include 'BaiTap/chuong6/Bt2_3.php';
							break;
						case 'c6b4':
							include 'BaiTap/chuong6/Bt2_4.php';
							break;
						case 'c6b5':
							include 'BaiTap/chuong6/Bt2_5.php';
							break;
						case 'c6b6':
							include 'BaiTap/chuong6/Bt2_6.php';
							break;
						case 'c6b7':
							include 'BaiTap/chuong6/Bai2_7/Bt2_7.php';
							break;
						case 'c6b7_1':
							include 'BaiTap/chuong6/Bai2_7/chiTiet.php';
							break;
						case 'c6b8':
							include 'BaiTap/chuong6/Bt2_8.php';
							break;
						case 'c6b9':
							include 'BaiTap/chuong6/Bt2_9.php';
							break;
						case 'c6b10':
							include 'BaiTap/chuong6/Bt2_10.php';
							break;
						case 'c6b11':
							include 'BaiTap/chuong6/Bt2_11.php';
							break;
						case 'c6b12':
							include 'BaiTap/chuong6/Bai12/Bt2_12_hienthi.php';
							break;
						case 'c6b12_1':
							include 'BaiTap/chuong6/Bai12/Bt2_12_sua.php';
							break;
						case 'c6b12_2':
							include 'BaiTap/chuong6/Bai12/Bt2_12_xoa.php';
							break;
					}
				}
			?>
		</div>
		
	</div>
</div>

<?php 
	include 'footer.inc';
?>