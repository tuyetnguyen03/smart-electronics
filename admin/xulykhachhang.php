<?php
	$con = mysqli_connect("localhost","root","","shop");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Khách hàng</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<?php include('nav.php');?>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-12">
				<h4>Khách hàng</h4>
				<?php
				$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id desc"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Email</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_khachhang['name']; ?></td>
						<td><?php echo $row_khachhang['phone']; ?></td>
						<td><?php echo $row_khachhang['address']; ?></td>
						
						<td><?php echo $row_khachhang['email'] ?></td>
						<td><a href="?quanly=xemgiaodich&khachhang=<?php echo $row_khachhang['khachhang_id'] ?>">Xem giao dịch</a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>

			<div class="col-md-12">
				<h4>Liệt kê lịch sử đơn hàng</h4>
				<?php
				if(isset($_GET['khachhang'])){
					$makh = $_GET['khachhang'];
				}else{
					$makh = '';
				}
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_giaodich,tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id AND '$makh'=tbl_giaodich.khachhang_id ORDER BY tbl_giaodich.magiaodich DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã giao dịch</th>
						<th>Tên sản phẩm</th>
						<th>Ngày đặt</th>
						
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_donhang['magiaodich']; ?></td>
					
						<td><?php echo $row_donhang['sanpham_name']; ?></td>
						
						<td><?php echo $row_donhang['ngaythang'] ?></td>
					
					
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>