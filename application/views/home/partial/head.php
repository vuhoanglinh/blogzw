<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $page_title; ?></title>
<meta name="description" content="<?php echo $cau_hinh['0']['description']; ?>"/>
<meta name="keywords" content="<?php echo $cau_hinh['0']['keywords']; ?>"/>
<?php if(isset($bai_viet)){ ?>
<!-- FACEBOOK -->
<meta property="og:title" content="<?php echo $bai_viet['0']['tieu_de']; ?>" />
<meta property="og:url" content="<?php echo site_url('blog').'/'.$bai_viet['0']['page_url']; ?>" />
<meta property="og:description" content='<?php echo strip_tags($bai_viet['0']['noi_dung']); ?>' />
<meta property="og:type" content="article />
<meta property="article:author" content="ZoomWolrd.vn" />
<meta property="og:image" content="<?php echo ASSETS_URL; ?>upload/blog/<?php echo $bai_viet['0']['hinh_dai_dien']; ?>" />
<?php } ?>
<!-- Jquery-UI -->
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>home/js/jquery-ui.css" rel="stylesheet">
<script src="<?php echo ASSETS_URL.'home/'; ?>js/jquery-1.10.2.js"></script>
<script src="<?php echo ASSETS_URL.'home/'; ?>js/jquery-ui.js"></script>
<!-- Custom Style -->
<link href="<?php echo ASSETS_URL.'home/'; ?>css/style.css" rel="stylesheet" type="text/css" />
<!-- Bootstrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>home/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>home/css/bootstrap-theme.min.css">


<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo ASSETS_URL; ?>home/js/bootstrap.min.js"></script>
<!-- Roboto google font -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  width: 100%;
height:300px;
  margin: auto;
}
.carousel-indicators {
	display: none;
}
</style>
<?php if($cau_hinh['0']['favicon'] == ''){ ?>
	<link rel="icon" type="image/x-icon" href="<?php echo ASSETS_URL; ?>home/img/favicon/favicon.ico" />
<?php }else{ ?>
	<link rel="icon" type="image/x-icon" href="<?php echo ASSETS_URL; ?>upload/favicon/<?php echo $cau_hinh['0']['favicon']; ?>" />	
<?php } ?>
<!-- google analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $cau_hinh['0']['google_anlytics']; ?>']);
  _gaq.push(['_trackPageview']);
  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!--adsence-->
<?php echo $cau_hinh['0']['adsence']; ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ab3159f8-4523-4d77-bcf7-e54789d9b640", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>