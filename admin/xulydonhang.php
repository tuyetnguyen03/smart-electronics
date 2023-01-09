<?php
	$con = mysqli_connect("localhost","root","","smart");

?>
<?php 
if(isset($_POST['capnhatdonhang'])){  //tồn tại khi ấn cập nhật đơn hàng
	$xuly = $_POST['xuly'];   //lấy lại tình trạng xử lý 
	$mahang = $_POST['mahang_xuly'];  // lấy lại mã hàng vừa cập nhật
	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'"); //cập nhật lại tình trạng của mã hàng vừa ấn cập nhật  NHƯNG NGÀY ĐẶT TỰ ĐỘNG THAY ĐỔI LUÔN
	$sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$mahang'");  //bảng giao dịch tạo ra để admin xem ls giao dịch của kh
}
?>
<?php
	if(isset($_GET['xoadonhang'])){  //tồn tại khi ấn xoá đơn hàng
		$mahang = $_GET['xoadonhang'];  //lấy lại mã đơn hàng vừa ấn xoá
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE mahang='$mahang'"); //kết nối và xoá trong bảng đơn hàng nhưng bảng khách hàng và giao dịch vẫn còn dữ liệu
		header('Location:xulydonhang.php');
	} 
	if(isset($_GET['xacnhanhuy'])&& isset($_GET['mahang'])){
		$huydon = $_GET['xacnhanhuy'];
		$magiaodich = $_GET['mahang'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
	$sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<?php
	include("nav.php");
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<h4>Liệt kê đơn hàng</h4>
				<?php
				//kết nối và select 2 bảng sản phẩm, đơn hàng, khách hàng theo sanphamid và nhóm theo mã hàng gọi ra hết, 	sắp xếp theo ngày giảm dần
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id GROUP BY mahang ORDER BY ngaythang DESC "); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tình trạng đơn hàng</th>
						<th>Tên khách hàng</th>
						<th>Ngày đặt</th>
						<th>Ghi chú</th>
						<th>Hủy đơn</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){  //chạy lần lượt theo mã  hàng
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						<!-- lấy ra mã hàng -->
						<td><?php echo $row_donhang['mahang']; ?></td> 
						
						<td><?php
							if($row_donhang['tinhtrang']==0){ //kiểm tra tình trạng đơn hàng từ csdl xong hiển thị lên
								echo 'Chưa xử lý'; //=0 là chưa xl
							}else{
								echo 'Đã xử lý'; //=1
							}
						?>
						</td>
							<!-- lấy ra tên khách, ngày đặt, ghi chú -->
						<td><?php echo $row_donhang['name']; ?></td> 
						<td><?php echo $row_donhang['ngaythang'] ?></td>
						<td><?php echo $row_donhang['note'] ?></td>

						<td><?php if($row_donhang['huydon']==0){ }
								elseif($row_donhang['huydon']==1){ //huydon=2 là đã xác nhận huỷ
							echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang='.$row_donhang['mahang'].'&xacnhanhuy=2">Xác nhận hủy đơn</a>';
						}else{
							echo 'Đã hủy';
						} 
						?></td>
						<!-- lấy mã hàng muốn xoá/ muốn xem chi tiết -->
						<td><a onclick="javascript:return confirm('Bạn muốn xóa bản ghi ?');"
						 href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem chi tiết </a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>
		
		<!-- Xem chi tiết -->
		<?php
			if(isset($_GET['quanly'])=='xemdonhang'){  //tồn tại khi ấn xem đơn hàng
				$mahang = $_GET['mahang']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
				$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.mahang='$mahang'"); //select theo cùng mã hàng
		?>
				
				<div class="col-md-7">
				<h4>Xem chi tiết đơn hàng</h4>
			<form action="" method="POST">
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Tổng tiền</th>
						<th>Ngày đặt</th>
					</tr>
				<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_chitiet)){ //chuyển thành mảng, lần lượt i
						$i++;
				?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_donhang['mahang']; ?></td>
						
						<td><?php echo $row_donhang['sanpham_name']; ?></td>
						<td><?php echo $row_donhang['soluong']; ?></td>
						<td><?php echo $row_donhang['sanpham_giakhuyenmai']; ?></td>
						<!-- tính tổng tiền của từng sp -->
						<td><?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_giakhuyenmai']).'vnđ'; ?></td>  
						<td><?php echo $row_donhang['ngaythang'] ?></td>
						<!-- lấy mã hàng khi chọn xử lý 0 or 1 -->
						<input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">

					</tr>
					 <?php
					} 
					?> 
				</table>
					<!-- cập nhật tình trạng -->
				<select class="form-control" name="xuly">  
					<option value="1">Đã xử lý | Giao hàng</option>
					<option value="0">Chưa xử lý</option>
				</select><br>

				<input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
			</form>
				</div>  
			<?php
			}
			?> 
			
		</div>
	</div>
	
</body>
</html>