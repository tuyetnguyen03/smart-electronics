<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
        <li><a href="xulydanhmuc.php"><img src="Icons/type.png"><span></span>Danh mục sản phẩm</a></li>
        <li><a href="xulysanpham.php"><img src="Icons/product.png"><span></span>Sản phẩm</a></li>
        <li><a href="xulydanhmucbaiviet.php"><img src="Icons/list.png"><span></span>Danh mục bài viết</a></li>
        <li><a href="xulybaiviet.php"><img src="Icons/news.png"><span></span>Bài viết</a></li>
        <li><a href="Xulylienhe.php"><img src="Icons/communicate.png"><span></span>Liên hệ</a></li>
        <li><a href="xulyquantrivien.php"><img src="Icons/user.png"><span></span>Quản trị viên</a></li>
        <li><a href="xulykhachhang.php"><img src="Icons/customer.png"><span></span>Khách hàng</a></li>
        <li><a href="Xulydonhang.php"><img src="Icons/orders.png"><span></span>Đơn hàng</a></li>
      </ul><br>
  </div>
</body>
</html>
