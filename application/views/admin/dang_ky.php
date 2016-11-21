<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="index.html">
        <h2 class="form-signin-heading">Đăng Ký</h2>
        <div class="login-wrap">
            <p>Điền Thông Tin Cá Nhân</p>
            <input type="text" class="form-control" placeholder="Họ Và Tên" autofocus required>
            <input type="text" class="form-control" placeholder="Địa Chỉ" autofocus required>
            <input type="email" class="form-control" placeholder="Email" autofocus>
            <input type="text" class="form-control" placeholder="Tỉnh/Thành Phố" autofocus required>
            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                    <input name="sample-radio" id="radio-01" value="1" type="radio" checked /> Nam
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                    <input name="sample-radio" id="radio-02" value="1" type="radio" /> Nữ
                </label>
            </div>

            <p> Điền Thông Tin Tài Khoản Của Bạn</p>
            <input type="text" class="form-control" placeholder="Tên Truy Cập" autofocus required>
            <input type="password" class="form-control" placeholder="Mật Khẩu" required>
            <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu" required>
            <label class="checkbox">
                <input type="checkbox" value="agree this condition" required> Tôi đồng ý với các điều khoản dịch vụ và bảo mật.
            </label>
            <button class="btn btn-lg btn-login btn-block" name="tao" type="submit">Tạo Tài Khoản</button>

            <div class="registration">
                Đã Tạo Tài Khoản.
                <a class="" href="login.html">
                    Đăng Nhập
                </a>
            </div>

        </div>

      </form>

    </div>


  </body>
</html>
