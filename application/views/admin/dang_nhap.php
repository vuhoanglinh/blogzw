<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Đăng Nhập Quản Trị</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ASSETS_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ASSETS_URL; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo ASSETS_URL; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo ASSETS_URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo ASSETS_URL; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo ASSETS_URL; ?>js/html5shiv.js"></script>
    <script src="<?php echo ASSETS_URL; ?>js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">
	
    <div class="container">
		<?php if(isset($_SESSION['error']) && $_SESSION['error'] != ''){ ?>
	  <div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<!-- Noi dung -->
		<p align="center"><?php echo $_SESSION['error'];?></p>
	  </div>
	  <?php 
		unset($_SESSION['error']);
	  } ?>
      <form class="form-signin" action="<?php echo site_url('admin/submit_dang_nhap')?>" method="post">
        <h2 class="form-signin-heading">Đăng Nhập Quản Trị</h2>
        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="Tên truy cập" autofocus required>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
            <label class="checkbox">
                <!--<input type="checkbox" name="remember" value="remember-me"> Nhớ tài khoản
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Quên mật khẩu?</a>
                </span>-->
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Đăng Nhập</button>                                 
        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Quên mật khẩu ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Điền vào địa chỉ Email của bạn để tạo lại mật khẩu</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Hủy</button>
                          <button class="btn btn-success" type="button">Gửi</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo ASSETS_URL; ?>js/jquery.js"></script>
    <script src="<?php echo ASSETS_URL; ?>js/bootstrap.min.js"></script>


  </body>
</html>
