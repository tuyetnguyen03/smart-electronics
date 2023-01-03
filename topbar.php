<?php

	if(isset($_POST['dangnhap_home'])) {  //tồn tại khi ấn submit đăng nhập
		$taikhoan = $_POST['email_login'];  //lấy lại email và pass
		$matkhau = $_POST['password_login'];
		$input=$_POST['txtcaptcha'];
		if($input!=$_SESSION['captcha']){
		$_SESSION['message'] = "* Wrong captcha !!!";}
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Làm ơn không để trống")</script>';
		}else{
			$sql_select_admin = "SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1"; //select ra kh có tk
			$count = mysqli_query($con,$sql_select_admin); //đếm sl dòng
			$row_dangnhap = mysqli_fetch_array($count);  //chuyển sang mảng
			if($count>0 &&($input==$_SESSION['captcha'])){  //nếu dòng >0 tức có tk
				$_SESSION['dangnhap_home'] = $row_dangnhap['name']; //nếu ok thì sẽ tạo 1 session phiên đăng nhập = tên khách hàng
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id']; //tạo 1 session phiên mãkh = khách hàng id
				$_SESSION['email'] = $row_dangnhap['email'];
				header('Location: index.php');  //HƯỚNG VỀ TRANG INDEX NOT GIỎ HÀNG
				
			}else{
				if($count==0)
				echo "<script> alert('Tài khoản hoặc mật khẩu bị sai') </script>";
				else
					echo "<script> alert('Đã xảy ra lỗi') </script>";

			}
			
		}
	}elseif(isset($_POST['dangky'])){
		$name = $_POST['name'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$password = $_POST['password'];
	 	$note = $_POST['note'];
	 	$address = $_POST['address'];
	 	$giaohang = $_POST['giaohang'];
 
 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) valuesz ('$name','$phone','$email','$address','$note','$giaohang','$password')");
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
		$_SESSION['email'] = $row_khachhang['email'];

 		header('Location:index.php?quanly=giohang');
 
	}elseif(isset($_GET['dangxuat'])){ //tồn tại khi ấn đăng xuất
		$id = $_GET['dangxuat']; //lấy lại dangxuat=1
		if($id==1){
			unset($_SESSION['dangnhap_home']);
		   session_destroy();
		   $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE khachhang_id=1000"); //xoá hết giỏ hàng của khách hàng ko có tk
		}
   
	
	}
?> 
<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>

						<?php
						if(isset($_SESSION['dangnhap_home'])){ 
						
						?>
						
						<li class="text-center border-right text-white">
							<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white">
								<i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home'] ?></a>
						</li>
						<?php
						}
						?>

						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0909999999
						</li>
						<?php
							if(!isset($_SESSION['dangnhap_home'])){ //nếu đăng nhập rồi thì ko hiện đăng nhập nữa
								echo '<li class="text-center border-right text-white">
									<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white" >
										<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
								</li>';
							}
						?>
						
						<?php
							if(!isset($_SESSION['dangnhap_home'])){ //nếu đăng nhập rồi thì ko hiện đăng kí nữa
								echo '<li class="text-center text-white">
									<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
										<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
								</li>';
							}
						?>

						<li>
						<?php  
						if(isset($_SESSION['dangnhap_home'])){ //tồn tại đăng nhập thì xuất hiện đăng xuất
							echo '<a href="index.php?quanly=giohang&dangxuat=1" class="text-center text-white">Đăng xuất</a>' ;
						}else{
							echo '';
						}
						?>
						</li>	
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<p>Please enter the captcha:</p>
        				<input type="text" name="txtcaptcha" value=""> 
       					<img src="include/captcha.php" title="" alt="" /><br />
       					<p id="message" style="color: #c0392b"><?php 
			        			if(isset($_SESSION['message'])){
            					echo $_SESSION['message'];
            					unset($_SESSION['message']);
        						} ?>
    					</p>

						<div class="right-w3l">
							<!-- name= dangnhap_home, nếu tồn tại dangnhap_home phương thức post thì ghi đăng xuất, ngược lại -->
							<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập"> 
						</div>
						
						<p class="text-center dont-do mt-3">Chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
							<input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Đăng ký">
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->
	
	
	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt=" " class="img-fluid">Smart Elec
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
								<input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="search_button" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="?quanly=giohang" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	