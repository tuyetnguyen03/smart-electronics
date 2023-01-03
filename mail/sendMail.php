<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "src/PHPMailer.php";
require "src/SMTP.php";
require 'src/Exception.php';
require 'vendor/autoload.php';
class mailer
{
    function dathangmail()
    {
        $mailDatHang = $_POST['email'];
        $nameDatHang = $_POST['name'];
        $mail = new PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy được thì chỉnh lại 0 
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'khanhpvph17641@fpt.edu.vn'; // SMTP username
            $mail->Password = 'ayvgnvrfmlspidqj'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // mã hoá theo kiểu encryption TLS/SSL
            $mail->Port = 465; // cổng port to connect to                

            $mail->setFrom('tuyetnguyen030202@gmail.com', 'Smart Electronics');
            $mail->addAddress($mailDatHang, $nameDatHang); //mail và tên người nhận
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'CÁM ƠN BẠN ĐÃ ĐẶT HÀNG';
            $mail->Body = 'FIX BUG';
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            $mail->send();
            echo "<script>alert('Đã đặt hàng thành công. Vui lòng kiểm tra email!')</script>";
        } catch (Exception $e) {
            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }
}
?>