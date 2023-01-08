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
	<!--<p>Xin chào :<?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p> -->
	<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="#">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav> -->
	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?>
	<button type="button" class="btn btn-warning"><a href="?login=dangxuat">Đăng xuất</a></button>
	<?php include("slidebar.php");?>

    <div class="col-sm-9">
      <h4><small>GIỚI THIỆU VỀ CHÚNG TÔI</small></h4>
      <hr>
      <h2>Lịch sử hình thành và phát triển của khoa MIS</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Hà Nội ngày 8 tháng 10 năm 2022</h5>
      <h5><span class="label label-danger">HVNH</span> <span class="label label-primary">MIS</span></h5><br>
      <p>Khoa Hệ thống Thông tin Quản lý được thành lập vào năm 2008, tiền thân là Bộ môn Toán. Trải qua 10 năm hình thành và phát triển, Khoa đã có những bước đổi mới và chuyên sâu trong ngành Hệ thống thông tin quản lý (HTTTQL).Trong thời gian tới, Khoa HTTTQL- Học viện Ngân hàng sẽ tiếp tục tạo điều kiện hơn nữa cho các giảng viên học tập nâng cao trình độ chuyên môn, tham gia cộng tác với các doanh nghiệp nhằm nắm bắt được các xu thế phát triển công nghệ trong thực tế để chỉnh sửa, phát triển chương trình đào tạo nhằm đào tạo các thế hệ sinh viên đáp ứng được nhu cầu về nguồn lực CNTT trong thời kỳ cách mạng công nghiệp 4.0. Trong một tương lai không xa, Khoa HTTTQL sẽ tiếp tục mở rộng hệ đào tạo cử nhân Công nghệ thông tin và Thạc sỹ HTTTQL.</p>
      <br><br>
      
      <h4><small>Bộ môn Lập trình WEB</small></h4>
      <hr>
      <h2>Tổng quan về Lập trình Web</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Hà Nội ngày 8 tháng 10 năm 2022</h5>
      <h5><span class="label label-success">LTW</span></h5><br>
      <p>Lập trình web là công việc của một Web Developer (Lập trình viên website) có nhiệm vụ nhận toàn bộ dữ liệu (Giao diện web tĩnh) từ bộ phận thiết kế web để chuyển thành một hệ thống website hoàn chỉnh có tương tác với CSDL và tương tác với người dùng dựa trên ngôn ngữ máy tính.Đây là công việc được khá là nhiều các bạn lập trình viên yêu thích, quan trọng là từ khi thế giới di động phát triển mạnh.Khi làm việc tại các công ty lập trình mobile bạn có thể có nhiều cơ hộ để phát huy sự sáng tạo của mình. Và cơ hội tiếp cận với khoa học công nghệ mới nhất.</p>
      <hr>

      <h4><small>Website bán điện thoại</small></h4>
      <hr>
      <h2>Hệ thống quản trị Web</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Hà Nội ngày 8 tháng 10 năm 2022</h5>
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