<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="css/style_register_form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
<section class="body">
    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <span class="logo-font">Accessory</span>Store
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <h3 class="header-title">REGISTER</h3>
            <form class="register-form" action="thuc_hien_dang_ki.php" method="POST">
                                    
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" name="names" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Tên của bạn</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" name="phone" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Điện thoại</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" name="address" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Địa chỉ</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" name="note" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Ghi chú</label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg" name="re_password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng kí</button>
                                    </div>
                                    

            </form>
                                
                </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>