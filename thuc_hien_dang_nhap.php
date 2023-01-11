<?php
$tenDangNhap = $_POST['email'];
$matKhau = $_POST['password'];

$con = mysqli_connect("localhost","root","","shop");

$sql = "SELECT * FROM `tbl_nguoidung` WHERE `email` = '" . $tenDangNhap . "' AND password = '" . $matKhau . "'";
$ketQuaTruyVan = $con->query($sql);
// die($sql);
$each = mysqli_fetch_array($ketQuaTruyVan);

if ($ketQuaTruyVan->num_rows == 1) {
    // echo "Đăng nhập thành công";
    session_start();
    $_SESSION["login"] = $each;
    // var_dump($_SESSION['login']);
    $_SESSION["id"] = $each['nguoi_dung_id'];
    $_SESSION["ten_dang_nhap"] = $each['name'];
    header('location:index.php?tb=Dang nhap thanh cong');
} else {

    header('location:login.php?error=Sai thong tin');
};