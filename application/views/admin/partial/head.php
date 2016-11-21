
<?php if(!isset($_SESSION['admin_confirm']) || $_SESSION['admin_confirm']!= '1' || !isset($_SESSION['admin_info']) || $_SESSION['admin_info']==NULL){
		$_SESSION['error'] = "Vui Lòng Đăng Nhập";
		header("Location: ".site_url('admin/dang_nhap'));
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ASSETS_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ASSETS_URL; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link type="text/css" href="<?php echo ASSETS_URL; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo ASSETS_URL; ?>assets/dropzone/css/dropzone.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>assets/bootstrap-daterangepicker/daterangepicker.css" />
	

    <!-- Custom styles for this template -->
    <link href="<?php echo ASSETS_URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo ASSETS_URL; ?>css/style-responsive.css" rel="stylesheet" />




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo ASSETS_URL; ?>js/html5shiv.js"></script>
      <script src="<?php echo ASSETS_URL; ?>js/respond.min.js"></script>
    <![endif]-->

	<link rel="icon" type="image/x-icon" href="<?php echo ASSETS_URL; ?>home/img/favicon/favicon.ico" />
  </head>
