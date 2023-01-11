<?php

$ho_ten= $_POST['names'];
$dien_thoai= $_POST['phone'];
$dia_chi= $_POST['address'];
$ghi_chu= $_POST['note'];
$email= $_POST['email'];
$mat_khau= $_POST['password'];

$con = mysqli_connect("localhost","root","","shop");



$sql = " INSERT INTO `tbl_nguoidung` (`name`,`phone`,`address`,`note`,`email`,`password`) VALUES ('".$ho_ten."', '".$dien_thoai."','".$dia_chi."','".$ghi_chu."','".$email."','".$mat_khau."')";
// die($sql);
if($con->query($sql)){
    echo"<script>
        alert('Đăng ký thành công');
        window.location = 'index.php';
        </script>";
}
 else {
    echo"<script>
        alert('Đăng ký thất bại');
        
        </script>";
 }

?>