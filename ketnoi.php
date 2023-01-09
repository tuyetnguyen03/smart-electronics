<?php
$con = new mysqli("localhost", "root", "", "shop");
if ($con->connect_error) {
    die("Lỗi kết nối" . $con->connect_error);

} else {
    echo "Kết nối thành công";
}

?>