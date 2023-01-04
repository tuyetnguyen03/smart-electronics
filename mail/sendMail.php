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
        $option = 1;
        $mailDatHang = $_POST['email'];
        $nameDatHang = $_POST['name'];
        $optionDatHang = $_POST['giaohang'];
        $mail = new PHPMailer(true); //true:enables exceptions
        $priceTotal = $_POST['price'];
        if ($optionDatHang == $option) {
            $img = 'https://static.wixstatic.com/media/9d8ed5_810e9e3b7fad40eca3ec5087da674662~mv2.png/v1/fill/w_1182,h_1182,al_c/9d8ed5_810e9e3b7fad40eca3ec5087da674662~mv2.png';
            $key = '<b>Vui Lòng Chuyển Khoản Vào <br/> Vietcombank <br/> 111111111</b>';
            $price = number_format($priceTotal) + 'VND';
            $style = '#006600';
        } else {
            $price = '';
            $style = '#999999';
            $img = 'https://img.freepik.com/premium-vector/thank-you-hand-drawn-premium-quality-vector-lettering-white-quote-black-background_167715-3262.jpg';
            $key = 'Cám ơn bạn đã đặt hàng<br/>';
        }
        $format = '
        <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #000000;" width="600">
          <tbody>
            <tr>
              <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">
                <img style="width: 180px; max-width: 180px; height: 120px; max-height: 120px; text-align: center; color: #ffffff;" alt="Logo" src=" '.$img.'" align="center" width="180" height="85">
                <p style="font-size: 16px; line-height: 24px; font-weight: 400; text-decoration: none; color: '.$style.';">
                  '.$key.'
                </p>
                <p style="margin-bottom: 0;color: #efb329; font-size: 13px; line-height: 24px; font-weight: 400; text-decoration: none; color: #ffffff;">
                  '. $price. ' 
                </p>
              </td>
            </tr>
          </tbody>
        </table>';
        
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy được thì chỉnh lại 0 
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'tuyetnguyen030202@gmail.com'; // SMTP username
            $mail->Password = 'aoianqyncoctaaey'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // mã hoá theo kiểu encryption TLS/SSL
            $mail->Port = 465; // cổng port to connect to                

            $mail->setFrom('tuyetnguyen030202@gmail.com', 'Smart Electronics');
            $mail->addAddress($mailDatHang, $nameDatHang); //mail và tên người nhận
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'CÁM ƠN BẠN ĐÃ ĐẶT HÀNG';
            if ($optionDatHang == $option) {
                $mail->Body = $format;
            } else {
                $mail->Body = $format;
            }
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