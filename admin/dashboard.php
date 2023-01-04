<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1000px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 105%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    button{
        float: right;
    }
    img{
        width: 10%;
        height: 10%;
        float: left;
    }
    span{
        padding-right: 10px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row content">
    <div class="col-sm-3 sidenav">
        <h4><a href="quantri.php">TRANG CHỦ QUẢN TRỊ</a></h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="xulyquantrivien.php"><img src="Icons/user.png"><span></span>Quản trị viên</a></li>
        <li><a href="xulykhachhang.php"><img src="Icons/customer.png"><span></span>Khách hàng</a></li>
      </ul><br>
  </div>
	<!--<p>Xin chào :<?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p> -->
	<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="#">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav> -->
	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?>
	<button type="button" class="btn btn-warning"><a href="?login=dangxuat">Đăng xuất</a></button>
<div class="col-sm-9">
      <h4><small>GIỚI THIỆU VỀ CHÚNG TÔI</small></h4>
      <hr>
	  <h4><small>Website bán phụ kiện và quà tặng</small></h4>
      <hr>
      <h2>Hệ thống quản trị Web</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Hà Nội ngày 11 tháng 1 năm 2023</h5>
      <h5><span class="label label-success">LTW</span></h5><br>
      <p>Hệ thống quản trị này có các chức năng quản lý sau:
    <br />
    - Quản lý danh mục sản phẩm
    <br />
    - Quản lý danh mục loại sản phẩm
    <br />
    - Quản lý danh mục nhà cung cấp
    <br />
    - Quản lý danh mục tin tức
    <br />
    - Quản lý danh mục các tài khoản
    <br />
    - Quản lý danh mục nhà cung cấp
    <br />
    - Quản lý danh mục bình luận, liên hệ
    <br />
    </p>
    <hr>
</div>
</body>
</html>