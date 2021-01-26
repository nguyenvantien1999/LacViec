<?php 
	include 'header.inc';
 ?>
<div id="content">
	<div id="slide" class="carousel slide mt-3 container" data-ride="carousel" >					
		<h4 class="text-center p-2"><i>Dân ta phải biết sử ta,<br>
			cho tường gốc tích nước nhà Việt Nam.</i>
		</h4>
		<!-- The slideshow -->
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="anh/gialong2.jpg" class="img-fluid">
				<div class="carousel-caption">
			        <h3 class="text-light shadow">Vua Gia Long</h3>
			        <p>Nguyễn Phúc Ánh</p>
		      	</div> 
			</div>
			<div class="carousel-item">
		  		<img src="anh/tranhungdao2.jpg" class="img-fluid">
		  		<div class="carousel-caption">
			        <p>Trần Quốc Tuấn</p>
		      	</div> 
			</div>
			<div class="carousel-item">
		  		<img src="anh/ngoquyen2.jpg" class="img-fluid">
		  		<div class="carousel-caption">
			        <h3 class="text-light shadow">Tiền Ngô Vương</h3>
			        <p>Ngô Quyền</p>
		      	</div> 
			</div>
		</div>
	</div>
	<div id="bannerLR" class="container-fluid sticky-top" style="z-index: 0;">
		<div style="width: 15%; padding-right: 20px; ">
			<img class="img-fluid d-none d-xl-block" src="anh/hungvuong3.jpg" alt="">
		</div>
		<div style="width: 80%;">
			
		</div>
		<div class="" style="width: 15%; padding-left: 20px;">
			<img class="img-fluid d-none d-xl-block" src="anh/dinhbolinh.jpg" alt="">
		</div>
	</div>

	<!-- Nội dung -->
	<div class="container" style="z-index: 1; position: relative;">
		<div class="pt-2 tieuDe">
			<h3 class=""><b>TRUYỆN TRANH</b></h3>	
		</div>

		<div class="mt-3 khungTr pt-4 pb-4">
			
			<div id="slideTr" class="carousel slide col-lg-12" data-ride="carousel">
				<div class="carousel-inner"> 
					<div class="carousel-item active">
						<div class="row">
							<?php
								$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
								mysqli_set_charset($conn, 'UTF8');
								$sql="select hinh, noidung from truyen where matl ='truyentranh' limit 0,12";
								$result = mysqli_query($conn, $sql);
								
								if(mysqli_num_rows($result) <> 0)
								{ 	$tong = 0;
									while($rows=mysqli_fetch_row($result))
									{ 
										echo "<div class='col-3'>
											<a href=\"truyen/$rows[1]\"><img class=\"img-fluid\" src=\"anh/truyen/$rows[0]\"></a><hr>";
										echo "</div>";
										$tong++;
										if ($tong == 4) {
											echo "</div></div>";
											echo "<div class='carousel-item'>
													<div class='row'>";
											$tong = 0;
										}
									}
								}
								
							?> 		
						</div>   
					</div>
				</div>
				<a class="carousel-control-prev sangTrang" href="#slideTr" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next sangTrang" href="#slideTr" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>	
			</div>		
		</div>
		<div class="pt-2 tieuDe">
			<h3><b>TRUYỆN CHỮ</b></h3>	
		</div>
		<?php
			$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
			mysqli_set_charset($conn, 'UTF8');
			$sql="select tentruyen, hinh, noidung from truyen where matl != 'truyentranh' limit 0,8";
			$result = mysqli_query($conn, $sql);
			echo '<br>';
			echo "<div class='row'>";
			if(mysqli_num_rows($result) <> 0)
			{ 	$tong = 0;
				while($rows=mysqli_fetch_row($result))
				{ 
					echo "<div class='col-3'>";	
					echo "<h4 class='titleVD' style='text-align: center;'>$rows[0]</h4>
						<a href=\"truyen/$rows[2]\"><img class=\"img-fluid\" src=\"anh/truyen/$rows[1]\"></a><hr>";
					echo "</div>";

					$tong++;
					if ($tong == 4) {
						echo "</div>";
						echo "<div class='row'>";
						$tong = 0;
					}
				}
			}
			echo "</div>";
		?>
		<div class="pt-2 tieuDe">
			<h3><b>VIDEO</b></h3>	
		</div>
		<?php
			$conn = mysqli_connect('localhost', 'root', '', 'lacviet');
			mysqli_set_charset($conn, 'UTF8');
			$sql="select tenvd, link from video limit 0,4";
			$result = mysqli_query($conn, $sql);
			echo '<br>';
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
			echo "</div>";
		?>
	</div>
</div>
<?php 
	include 'footer.inc';
 ?>