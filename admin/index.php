<?php
session_start();
$con = mysqli_connect("localhost","root","","shop");

?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		$input=$_POST['txtcaptcha'];
		if($input!=$_SESSION['captcha']){
		$_SESSION['message'] = "* Wrong captcha !!!";}
		//header('location:index.php');}
		if($taikhoan=='' || $matkhau ==''){
			echo '<p>Xin nhập đủ</p>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0 &&($input==$_SESSION['captcha'])){
				$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
				$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
				header('Location: dashboard.php');}
			else{
				if($count==0)
				echo "<script> alert('Tài khoản hoặc mật khẩu bị sai') </script>";
				else
					echo "<script> alert('Đã xảy ra lỗi') </script>";
			} 
		}
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dn.css">
	<style type="text/css">
		.capcha{
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
  margin-bottom: 20px;
  margin-right: 10px;
}
	</style>
</head>
<body>
<!--	<h2 align="center">Đăng nhập Admin</h2>
	<div class="col-md-6">
	<div class="form-group">
		<form action="" method="POST">
		<label>Tài khoản</label>
		<input type="text" name="taikhoan" placeholder="Điền Email" class="form-control"><br>
		<label>Mật khẩu</label>
		<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control"><br>
		<input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
		</form>
	</div>
	</div> -->
	<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <!--<div class="row">-->
                        <div class="col-lg-10 col-xl-7 mx-auto"> 
                            <h3 class="display-4">Đăng nhập</h3>
                         
                            <form action="" method="post">
                                <div class="form-group mb-3">
                                    <label>Tài khoản</label>
                                    <input name="taikhoan" type="text" placeholder="Điền Email" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" >
                                </div>
                                <div class="form-group mb-3">
                                    <label>Mật khẩu</label>
                                    <input name="matkhau" type="password" placeholder="Điền mật khẩu" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div>
                                <p>Please enter the captcha:</p>
        							<input type="text" name="txtcaptcha" value="" class="capcha">
        							<img src="captra.php" title="" alt="" /><br />
        								
        						</div>		
                                <button type="submit" name="dangnhap" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Đăng nhập admin</button>
                            </form>
                            <p id="message" style="color: #c0392b"><?php 
			        			if(isset($_SESSION['message'])){
            					echo $_SESSION['message'];
            					unset($_SESSION['message']);
        						} 
    ?>	 					</p>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>	
</body>
</html>