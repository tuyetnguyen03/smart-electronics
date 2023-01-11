<?php
$id_nguoidung = $_SESSION['id'];
if (isset($_POST['themgiohang'])) { //tồn tại khi ấn thêm giỏ hàng
    //lấy lại dữ liệu
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $gia = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    //kết nối và thực hiện truy vấn lấy dữ liệu từ db bảng giỏ hàng theo mã sp
    $sql_select_giohang = "SELECT * FROM tbl_giohang WHERE sanpham_id = $sanpham_id and khachhang_id = '$id_nguoidung'";
    //đếm số dòng trong bảng giỏ hàng có mấy dòng theo mã sp đã chọn
    $count = mysqli_query($con, $sql_select_giohang);

    if (mysqli_num_rows($count) > 0) {  //nếu số dòng>0 tức là đã có sp đó rồi ->tăng sản phẩm đó lên 1
        $row_sanpham = mysqli_fetch_array($count); //chuyển từ dạng bảng sang mảng
        $soluongsp = $row_sanpham['soluong'] + 1;  //tăng số lượng lên 1 của sp đó
        $sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' and khachhang_id='$id_nguoidung'"; //viết lệnh update số lượng theo mã sp
    } else {  //là sp mới
        $soluongsp = $soluong;
        //viết lệnh insert
        $sql_giohang = "INSERT INTO tbl_giohang(tensanpham, sanpham_id, giasanpham, hinhanh, soluong, khachhang_id)"
            . "VALUES('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$id_nguoidung')";
    }
    //kết nối và thực hiện lệnh sql
    $insert_row = mysqli_query($con, $sql_giohang);
} elseif (isset($_POST['capnhatsoluong'])) { //tồn tại khi ấn cập nhật số lượng
    for ($i = 0; $i < count($_POST['product_id']); $i++) { //index chạy từ 0<số lượng sp
        $sanpham_id = $_POST['product_id'][$i];  //ứng với mã sp cập nhật lại số lượng tương ứng
        $soluong = $_POST['soluong'][$i];
        if ($soluong <= 0) {  //<=0 thì xoá
            $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id' and khachhang_id='$id_nguoidung'");
        } else {  //kết nối và thực hiện lệnh cập nhật số lượng
            $sql_update = mysqli_query($con, "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' and khachhang_id='$id_nguoidung'");
        }
    }
} elseif (isset($_GET['xoa'])) {  //tồn tại khi ấn x
    $id = $_GET['xoa']; //lấy lại giohangid (mỗi sp thêm vào giỏ tự sinh ra giohangid) theo phương thức get xoa
    $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE giohang_id='$id'"); //kết nối và thực hiện lệnh

} elseif (isset($_POST['thanhtoan'])) {  //tồn tại khi ấn thanh toán

    $giaohang = $_POST['giaohang']; //hình thức giao hàng: 1:ATM, 0:tiền mặt
    $name_khachhang = $_POST['name'];
    $email_khachhang = $_POST['email'];
    $sdt_khachhang = $_POST['phone'];
    $nguoidung_id = $id_nguoidung;
    $dia_chi_khachhang = $_POST['address'];
    $tong_tien_khachhang = $_POST['price_total'];
    $note_khachhang = $_POST['note'];
    $date = Date('Y-m-d h:i');
    if (!isset($_SESSION['dangnhap_home'])) {

        mysqli_query($con, "INSERT INTO tbl_khachhang(name, nguoidung_id, email, sdt, dia_chi, tong_tien, note)
        values ('$name_khachhang','$nguoidung_id','$email_khachhang','$sdt_khachhang','$dia_chi_khachhang','$tong_tien_khachhang','$note_khachhang')");
        $khach_hang_id = mysqli_insert_id($con);
    }

    $mahang = rand(0, 9999);  //random tự sinh ra mã hàng tránh trùng lặp đơn hàng, mỗi đơn hàng có 1 mã hàng giống nhau
    for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) { //chạy từ i=0 đến hết sản phẩm thanh toán
        $sanpham_id = $_POST['thanhtoan_product_id'][$i];  //lần lượt lưu mã sp và sl
        $soluong = $_POST['thanhtoan_soluong'][$i];
        
        $gia = $_POST['giasanpham'];
        $optionDatHang = $_POST['giaohang'];
        mysqli_query($con, "INSERT INTO tbl_khachhang(name, nguoidung_id, email, phone, address, tong_tien, note)
        values ('$name_khachhang','$nguoidung_id','$email_khachhang','$sdt_khachhang','$dia_chi_khachhang','$tong_tien_khachhang','$note_khachhang')");
        $khach_hang_id = mysqli_insert_id($con);
        

        mysqli_query($con, "INSERT INTO tbl_donhang
               (khachhang_id, sanpham_id, soluong, mahang, pthuc, thoi_gian_dat, tinhtrang, nguoidung_id) 
        values ('$khach_hang_id','$sanpham_id','$soluong','$mahang', '$giaohang', '$date', 0, $id_nguoidung)"); //lần lượt insert vào bảng đơn hàng
        $don_hang_id = mysqli_insert_id($con);
       // 	sanpham_id	soluong	pthuc	mahang	khachhang_id	thoi_gian_dat	tinhtrang
        $sql_donhang_chitiet = mysqli_query($con, "INSERT INTO tbl_giaodich(don_hang_id, san_pham_id, so_luong, gia) 
        values ('$don_hang_id','$sanpham_id','$soluong', '$gia')"); //lần lượt insert vào bảng đơn hàng

        $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'"); //sau khi thanh toán thì xoá hết

    }
    require('./mail/sendMail.php');
}
?>

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            Giỏ hàng của bạn
        </h3>


        <!-- //tittle heading -->
        <div class="checkout-right">
            <div class="table-responsive">
                <form action="" method="POST">

                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tên sản phẩm</th>

                                <th>Giá</th>
                                <th>Giá tổng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $total = 0;
                            $sql_lay_giohang = "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC";
                            $kq1 = mysqli_query($con, $sql_lay_giohang);

                            while ($row_fetch_giohang = mysqli_fetch_assoc($kq1)) {  //duyệt qua từng mã giỏ hàng

                                $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham']; //tính tổng từng sp
                                $total += $subtotal; //tính tổng tiền tất cả các sp
                                $i++;; ?>
                                <tr class="rem1">
                                    <td class="invert"><?php echo $i ?></td>
                                    <td class="invert-image">
                                        <a href="single.html">
                                            <img src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " height="120" class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <!-- lấy mã sp ẩn để cập nhật giỏ hàng cùng số lượng, []là để lấy tất cả theo chuỗi-->
                                        <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                        <input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">

                                    </td>
                                    <td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
                                    <td class="invert"><?php echo number_format($row_fetch_giohang['giasanpham']) . 'vnđ' ?></td>
                                    <!-- hiển thị tổng tiền của từng sp -->
                                    <?php $keyGia = $row_fetch_giohang['giasanpham'] ?>
                                    <td class="invert"><?php echo number_format($subtotal) . 'vnđ' ?></td>
                                    <td class="invert">
                                        <!-- ấn xoá lấy lại mã giỏ hàng muốn xoá và chuyển đến phần xoá isset get xoa-->
                                        <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <!-- hiển thị tổng tiền của tất cả các sp ở ngoài vòng lặp while -->
                                <td colspan="7">Tổng tiền : <?php echo number_format($total) . 'vnđ' ?></td>

                            </tr>
                            <tr>
                                <!-- hiển thị nút submit cập nhật giỏ hàng -->
                                <td colspan="7">
                                    <input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
                                    <?php if (empty($_SESSION["id"])) { ?>
                                        <a href="login.php" class="btn btn-primary">Thanh Toán </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <?php if (!empty($_SESSION["id"])) { ?>
                    <?php $thongtin_nguoidung = "SELECT * FROM tbl_nguoidung WHERE nguoidung_id = $id_nguoidung";
                    $nguoiDung = mysqli_query($con, $thongtin_nguoidung);
                    ?>
                    <form action="" method="post" class="creditly-card-form agileinfo_form">
                        <?php
                        if (!isset($_SESSION['dangnhap_home'])) {
                            while ($nguoi_dung = mysqli_fetch_array($nguoiDung)) { ?>
                                <div class="checkout-left">
                                    <div class="address_form_agile mt-sm-5 mt-4">
                                        <h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
                                        <!-- <form action="" method="post" class="creditly-card-form agileinfo_form"> -->
                                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                            <div class="information-wrapper">
                                                <div class="first-row">
                                                    <div class="controls form-group">
                                                        <!-- kh điền và lấy lại thông tin khi kh điền -->
                                                        <input class="billing-address-name form-control" value="<?= $nguoi_dung['name'] ?>" type="text" name="name" placeholder="Điền tên" required="">
                                                    </div>
                                                    <div class="w3_agileits_card_number_grids">
                                                        <div class="w3_agileits_card_number_grid_left form-group">
                                                            <div class="controls">
                                                                <input type="text" class="form-control" value="<?= $nguoi_dung['phone'] ?>" placeholder="Số phone" name="phone" required="">
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_right form-group">
                                                            <div class="controls">
                                                                <input type="text" class="form-control" value="<?= $nguoi_dung['address'] ?>" placeholder="Địa chỉ" name="address" required="">
                                                            </div>
                                                            <input type="hidden" name="giasanpham" value="<?php  echo $keyGia ?>">
                                                        </div>
                                                    </div>
                                                    <div class="controls form-group">
                                                        <input type="text" class="form-control" placeholder="Email" value="<?= $nguoi_dung['email'] ?>" name="email" required="">
                                                        <input type="hidden" name="price_total" value="<?= $total ?>">
                                                    </div>
                                                <?php
                                            }
                                                ?>
                                                <div class="controls form-group">
                                                    <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
                                                </div>

                                                <div class="controls form-group">
                                                    <select class="option-w3ls" name="giaohang">
                                                        <option>Chọn hình thức giao hàng</option>
                                                        <option value="1">Thanh toán ATM</option>
                                                        <option value="0">Thanh toán tiền mặt tại nhà</option>
                                                    </select>
                                                </div>
                                                </div>
                                                <?php

                                                //lấy ra tt từ bảng giỏ hàng theo mã giỏ hàng vừa thêm
                                                $sql_lay_giohang = "SELECT * FROM tbl_giohang WHERE khachhang_id='$id_nguoidung' ORDER BY giohang_id DESC";
                                                $kq2 = mysqli_query($con, $sql_lay_giohang);
                                                while ($row_thanhtoan = mysqli_fetch_array($kq2)) {
                                                ?>
                                                    <!-- lấy lại mã từng sp và số lượng tương ứng -->
                                                    <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                                                    <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <!-- </form> -->
                                        <!-- submit khi ấn thanh toán -->
                                        <input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%; margin-left: 203px;" value="Thanh toán">
                                    </div>
                                </div>
                            <?php } ?>
                    </form>
                <?php } else {
                } ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>