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
							if (isset($_SESSION['id'])) {
								$id_khachhang = $_SESSION['id'];
							} else {
								$id_khachhang = $_SESSION['id'];
							}
							$sql_select = mysqli_query($con, "SELECT * FROM tbl_donhang WHERE tbl_donhang.khachhang_id = $id_khachhang
							 GROUP BY tbl_giaodich.thoi_gian_dat DESC");
							?>
							?>
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
								while ($row_donhang = mysqli_fetch_array($sql_select)) {
									$i++;
								?>
									?>
									?>
									<tr>
										<td><?php echo $i; ?></td>

										<td><?php echo $row_donhang['ma_don_hang'];
											$key = $row_donhang['ma_don_hang'] ?></td>
										<td><?php echo $row_donhang['thoi_gian_dat'] ?></td>
										<td>
											<a href="index.php?quanly=chi_tiet_don_hang=<?php echo $row_donhang['ma_don_hang'] ?>">
												Xem chi tiết
											</a>
										</td>
										<td><?php
											if ($row_donhang['tinhtrangdon'] == 0) {
												echo 'Đã đặt hàng';
											} else {
												echo 'Đã xử lý | Đang giao hàng';
											}
											?></td>
										<td>
											<?php
											if ($row_donhang['huydon'] == 0) {
											?>
												<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1">Yêu cầu hủy</a>
											<?php
											} elseif ($row_donhang['huydon'] == 2) {		//huydon=2: admin đã chấp nhận huỷ đơn 							
												echo 'Đã hủy';
											?>
											<?php
											} elseif ($row_donhang['huydon'] == 1) {  //huydon=1: đang chờ xử lý
												echo 'Đang chờ huỷ...';
											}
											?>
										</td>
									</tr>
								<?php } ?>
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