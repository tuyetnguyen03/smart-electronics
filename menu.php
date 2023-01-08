<?php 
		$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	?>
<div class="navbar-inner" >
		<div style="margin-right: 400px;" class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<!--<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">Danh mục sản phẩm</option>
							<?php
							while($row_category = mysqli_fetch_array($sql_category)) {
							?>
							<option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></option>
							<?php
							 }
							?>
						</select>
					</form>
				</div> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Trang chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						</li>
												<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=category&id=4" role="button"  aria-haspopup="true" aria-expanded="false">
								Dụng cụ học tập 							</a>
							
						</li>
												<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=category&id=3" role="button"  aria-haspopup="true" aria-expanded="false">
								Trang trí							</a>
							
						</li>
												<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=category&id=2" role="button"  aria-haspopup="true" aria-expanded="false">
								Đồ chơi							</a>
							
						</li>
												<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=category&id=1" role="button"  aria-haspopup="true" aria-expanded="false">
								Phụ kiện thời trang							</a>
							
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<?php
							$sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 

							?>
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tin tức
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=1">Thông tin dụng cụ học tập</a>
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=2">Thông tin trang trí</a>
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=3">Thông tin đồ chơi</a>
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=4">Thông tin phụ kiện thời trang</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?quanly=lienhe">Liên hệ</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->