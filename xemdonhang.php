<?php
// if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
// 	$huydon = $_GET['huydon'];
// 	$magiaodich = $_GET['magiaodich'];
// } else {
// 	$huydon = '';
// 	$magiaodich = '';
// }
// 	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
// 	$sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
?>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
					<!-- first section -->
					<div class="row">
						<?php
						if (isset($_SESSION['dangnhap_home'])) {
							echo 'Đơn hàng : ' . $_SESSION['dangnhap_home'];
						} ?>
						<div class="col-md-12">
							<?php
							
							?>
							<table class="table table-bordered ">
								<tr>
									<th>Thứ tự</th>
									<th>Mã giao dịch</th>

									<th>Ngày đặt</th>
									<th>Quản lý</th>
									<th>Tình trạng</th>
									<th>Yêu cầu</th>
								</tr>
								<?php
								$i = 0;
								if (isset($_SESSION['id'])) {
									$id_khachhang = $_SESSION['id'];
								} else {
									$id_khachhang = 1;
								}
								$sql_select = "SELECT * FROM tbl_donhang WHERE tbl_donhang.nguoidung_id = $id_khachhang
								 ORDER BY tbl_donhang.thoi_gian_dat DESC";
								$row_donhang = mysqli_fetch_assoc(mysqli_query($con, $sql_select));
								foreach ($row_donhang as $row_donhang2) {
									$i++;
									if (is_array($row_donhang2)) {
										?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row_donhang2['donhang_id']; ?></td>
										<td>
											<a href="index.php?quanly=chi_tiet_don_hang=<?php echo $row_donhang2['donhang_id'] ?>">
												Xem chi tiết
											</a>
										</td>
									
										<td>
											
										</td>
									</tr>
								<?php }} ?>
							</table>
						</div>
					</div>
					<!-- //first section -->
				</div>
			</div>
			<!-- //product left -->
			<!-- product right -->
		</div>
	</div>
</div>
<!-- //top products -->