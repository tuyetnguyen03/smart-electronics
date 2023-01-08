<?php 
   
    ob_start(); 

  
    if (!$_SESSION['dangnhap_home'])
       {
            echo "
                 <script type='text/javascript'>
                      alert('Bạn phải đăng nhập tài khoản để thanh toán !');
                 </script>";

            echo "
                 <script type='text/javascript'>
                      window.location.href='index.php?quanly=giohang';
                    //   location.reload();
                 </script>";
            exit();  
       }
;?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        table{
              width: 80%;
              margin-left: 60px;
              margin-right: 40px;
              margin-top: 50px;
              border: 1px solid;
            }
            tr, td{
                padding-left: 30px;
                border: 1px solid;
                color: ;
            }
        .top-section{
            display: flex;
            justify-content : space-between;
            /* width: 80%; */
            max-width: unset !important;

            
        }
        .bottom-section{
            display: flex;
            /* width: 74%; */
            justify-content : space-between;
            max-width: unset !important;
        }
        .checkout-btn{
            text-align: center;
            padding-left: 0 !important;
        }
        .payment-methods{
            margin-bottom: 30px;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            margin-left: 3%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .shipping-methods{
            margin-left: 3%;
            margin-bottom: 30px;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .receiver-info input{
            /* width: 90%; */
        }
        .col-md-6 , .col-md-12{
            margin-bottom: 20px
        }
        .oder-info{
            border-radius: 10px;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .receiver-info-section{
            width: 70%;
            border-radius: 10px;

            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

        }
        .checkout-btn input{
            background-color: #3e8eff;
            color: #FFF;
            padding: 11px 50px;
            border: 1px solid #3e8eff;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px;
            transition: ease-in-out  0.5s;

        }
        .checkout-btn input:hover{
            border: 1px solid #b29ddd;
            color: #FFF;
            background-color: #b29ddd;

        }
         h2{
            text-transform: uppercase;
            font-size: 25px;
        }
        /* .checkout-btn input::placeholder{
            font-size: 18px
        } */

    </style>
</head>
<body>

             
<div>
       
<div>
    <div>
   <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                Đơn hàng của bạn
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
            <?php
            $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");

            ?>

                <div class="table-responsive">
                    <form action="" method="POST">
                    
                    <table class="timetable_sub" style="border-left: 1px solid black;">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tên sản phẩm</th>

                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang))
                        { 
                        $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                            $total+=$subtotal;
                            $i++;
                        ?>
                            <tr class="rem1">
                                <td class="invert"><?php echo $i ?></td>
                                <td class="invert-image">
                                    
                                        <img src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " class="img-responsive" style="height: 110px;object-fit: contain;">
                                   
                                </td>
                                <td class="invert">
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                    <input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>" readonly="true">
                                
                                    
                                </td>
                                <td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
                                <td class="invert"><?php echo number_format($row_fetch_giohang['giasanpham']).'vnd' ?></td>
                                <td class="invert"><?php echo number_format($subtotal).'vnd' ?></td>
                                </td>
                            </tr>
                            <?php
                            } 
                            ?>
                            <tr>
                                <td class ="total-price" colspan="7">Tổng tiền : <?php echo number_format($total).'vnd' ?></td>

                            </tr>
                            <tr>
                                <td class ="total-price" colspan="7"><a href="index.php?quanly=giohang">Chỉnh sửa đơn hàng </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    <div class="checkout-left">
        <!-- Checkout Start -->
    <div class="address_form_agile">
    <form method="POST" action="index.php?quanly=thuchienthanhtoan" enctype="multipart/form-data" onsubmit="return kiem_tra_nhap_tt();"> 
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row-content">
                    <div class="col-lg-8 top-section">
                        <div class="checkout-inner oder-info">
                            <?php
                            ob_start();
                           // 1. Kết nối đến MÁY CHỦ DỮ LIỆU VÀ CSDL mà các bạn muốn lấy, thêm mới, muốn sửa, xóa dữ liệu
                           include("db/connect.php");
                            $id=$_SESSION['dangnhap_home'];
                           // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn
                           $sql = "
                                    SELECT *  
                                    FROM tbl_khachhang
                                    WHERE khachhang_id ='".$id."'
                                    ";

                            // 3. Thực thi câu lệnh truy vấn (mục đích trả về dữ liệu các bạn cần)
                            $noi_dung_thanh_vien = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($noi_dung_thanh_vien);
                            ;?>
                            <div class="scrolldown" data-spy="scroll" data-target="#billing-address">
                            <div class="billing-address">
                                <h2>Thông tin người đặt</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ tên người đặt</label>
                                        <input class="form-control" type="text"  value="<?php echo $row['name'];?> " name="txtHovaten" placeholder="Họ và tên" readonly="true">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail người đặt</label>
                                        <input class="form-control" type="text" value="<?php echo $row['email'];?>" readonly="true">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Điện thoại người đặt</label>
                                        <input class="form-control" type="text" value="<?php echo $row['phone'];?>" readonly="true">
                                    </div>
                                    <div class="col-md-12" >
                                        <label>Địa chỉ người đặt</label>
                                        <input class="form-control" type="text" value="<?php echo $row['address'];?>" readonly="true" style = "height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>  
                        <div class="controls form-group">
										<select class="option-w3ls" name="giaohang">
											<option>Chọn hình thức giao hàng</option>
											<option value="1">Thanh toán ATM</option>
											<option value="0">Thanh toán tiền mặt tại nhà</option>
											

										</select>
						
                        </div>
                    <div  class =" col-lg-8  bottom-section">
                    <div class="checkout-left checkout-inner receiver-info-section">
                        <!-- Checkout Start -->
            
                        <div class="address_form_agile  ">
                            <div class="receiver-info">
                                <div class="billing-address">
                                    <h2>Thông tin người nhận</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Họ tên người nhận</label>
                                            <input class="form-control " type="text" id="txtHovaten" name="txtHovaten" placeholder="Họ và tên" >
                                        </div>
                                        <div class="col-md-6">
                                            <label>Điện thoại người nhận</label>
                                            <input class="form-control" type="text" id="txtSodienthoai" name="txtSodienthoai" placeholder="Số điện thoại" >
                                        </div>
                                        <div class="col-md-12">
                                            <label>Địa chỉ người nhận</label>
                                            <input class="form-control" type="text" id="txtDiachi" name="txtDiachi" placeholder="Số nhà - Phường/Xã - Quận/Huyện - Tỉnh/Thành phố" >
                                        </div>
                                        <div class="col-md-12">
                                            <label>Email người nhận</label>
                                            <input class="form-control" type="text" id="txtEmail" name="txtEmail" placeholder="Email người nhận">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" type="text" id="txtGhichu" name="txtGhichu" placeholder="Mời nhập ghi chú nếu cần"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div colspan="2">
                                <div class="checkout-btn" style="align-content: center; padding-left: 50%; padding-top: 40px;" >
                                    <input type="submit" name="sub" value = "Đặt hàng" >
                                </div>
                            </div>
                            </div>                                   
                        </div>
                        
                    </div>
                </div>
       </div>
   </div>
    </form>

        <!-- Checkout End -->
       
        <script type="text/javascript">
        function kiem_tra_nhap_tt() {
            var hovaten = document.getElementById('txtHovaten').value;
            var sodienthoai = document.getElementById('txtSodienthoai').value;
            var diachi = document.getElementById('txtDiachi').value;
            var ghichu = document.getElementById('txtGhichu').value;
            var payment=document.getElementsByName('payment')

            // Kiểm tra nhập họ tên
            if (hovaten == '')
            {
                alert('Bạn chưa nhập họ tên người nhận');
                return false;
            }
            //Kiểm tra nhập sđt
            if (sodienthoai == '')
            {
                alert('Bạn chưa nhập số điện thoại người nhận');
                return false;
            }
            //Kiểm tra nhập địa chỉ
            if (diachi == '')
            {
                alert('Bạn chưa nhập địa chỉ người nhận');
                return false;
            }

            //Khi nhập đủ thông tin thì người dùng sẽ được chuyển đến trang thuc_hien_thanh_toan.php
             else
                {
                  
                    return true;
                }
        }
        </script>
        </body>
</html>

