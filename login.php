<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_register_form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <title>Đăng nhập</title>
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
                    <h3 class="header-title">LOGIN</h3>
                    <form class="login-form" action="thuc_hien_dang_nhap.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email or UserName">
                        </div>
                        <div class="form-group">
                            <input type="Password" class="form-control" name="password" placeholder="Password">
                            <a href="#!" class="forgot-password">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                        </div>
                        <div class="form-group">
                            <div class="text-center">New Member? <a href="#!">Sign up Now</a></div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>
</body>
</html>