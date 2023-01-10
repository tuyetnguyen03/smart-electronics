<?php
if (isset($_POST['dangnhap_home'])) {  //tồn tại khi ấn submit đăng nhập
    $taikhoan = $_POST['email_login'];  //lấy lại email và pass
    $matkhau = $_POST['password_login'];
    if ($taikhoan == '' || $matkhau == '') {
        echo '<script>alert("Làm ơn không để trống")</script>';
    } else {
        $sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1"); //select ra kh có tk
        $count = mysqli_num_rows($sql_select_admin); //đếm sl dòng
        $row_dangnhap = mysqli_fetch_array($sql_select_admin);  //chuyển sang mảng
        
        if ($count > 0) {  //nếu dòng >0 tức có tk
            
            $_SESSION['dangnhap_home'] = $row_dangnhap['name']; //nếu ok thì sẽ tạo 1 session phiên đăng nhập = tên khách hàng
            $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id']; //tạo 1 session phiên mãkh = khách hàng id
            $_SESSION['email'] = $row_dangnhap['email'];
            header('Location: index.php');  //HƯỚNG VỀ TRANG INDEX NOT GIỎ HÀNG

        } else {
            if ($count == 0)
                echo "<script> alert('Tài khoản hoặc mật khẩu bị sai') </script>";
            else
                echo "<script> alert('Đã xảy ra lỗi') </script>";
        }
    }
} elseif (isset($_POST['dangky'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $note = $_POST['note'];
    $address = $_POST['address'];
    $giaohang = $_POST['giaohang'];

    $sql_khachhang = mysqli_query($con, "INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
    $sql_select_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
    $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
    $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    $_SESSION['email'] = $row_khachhang['email'];
    header('Location:index.php?quanly=giohang');
} elseif (isset($_GET['dangxuat'])) { //tồn tại khi ấn đăng xuất
    $id = $_GET['dangxuat']; //lấy lại dangxuat=1
    if ($id == 1) {
        unset($_SESSION['dangnhap_home']);
        session_destroy();
        $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM tbl_giohang WHERE khachhang_id=1000"); //xoá hết giỏ hàng của khách hàng ko có tk
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
					<?php if(!empty($_SESSION["id"])) { ?>
						<li class="text-center border-right text-white">
							<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION["id"] ?>" class="text-white">
								<i class="fas fa-truck mr-2"></i>Xem đơn hàng</a>
						</li>
					<?php } else {
                        } ?>

					<li class="text-center border-right text-white">
						☎ 0908070605
					</li>
					<?php

					if (isset($_SESSION["ten_dang_nhap"])) {
						echo "Xin chào " . $_SESSION['ten_dang_nhap'];
					} else {
						echo '<li class="text-center border-right text-white">
									<a href="login.php" style="color:#FFF">Đăng nhập </a>
								</li> ';
                        if (!isset($_SESSION['dangnhap_home']))
                            echo '<li class="text-center text-white">
									<a href="Register.php" style="color:#FFF">Đăng ký </a>
								</li> ';
                    } ?>
                    <li>
                        <?php
                        if (isset($_SESSION['dangnhap_home'])) { //tồn tại đăng nhập thì xuất hiện đăng xuất
                            echo '<a href="index.php?quanly=giohang&dangxuat=1" class="text-center text-white">Đăng xuất</a>';
                        } else {
                            echo '';
                        }
                       
                        ?>
                         &emsp;<a class="text-center text-white" href="dang_xuat.php">Đăng xuất</a>
                       

                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>


<!-- register -->

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
                        <img src="image\logo.png" alt=" " class="img-fluid" style="height: 70px;">Accessory
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
                            <input class="form-control mr-sm-2" name="search_product" type="search"
                                   placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
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
                                    <link rel="stylesheet"
                                          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                    <div class="wrapper">
                                        <i class="fa" style="font-size:24px">&#xf07a;</i>
                                    </div>
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