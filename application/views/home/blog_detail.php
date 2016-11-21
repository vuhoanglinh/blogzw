<?php $this->load->view('home/partial/head'); ?>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div id="logo_head" align="center"> <a href="http://localhost/blogzw/"><img src="http://localhost/blogzw/assets/home/img/logo.png" id="img-logo" class="img-responsive"/></a> </div>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <?php foreach($ds_loai as $value) { ?>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php
							echo $value['detail']['ten_loai'];											
						
				?><span class="caret"></span></a>
                
                <?php if($value['child']!= NULL){ ?>
          <ul class="dropdown-menu" role="menu">
            
            <?php foreach($value['child'] as $child_item){ ?>
            <li><a href="<?php echo site_url('loai/'.$child_item['page_url']); ?>"><?php echo $child_item['ten_loai']; ?></a></li>
            <?php } ?>
          </ul>
          <?php } ?>
        </li>
        <?php 				
		} ?>
      </ul>
      <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
<div id="wrapper" class="container">
  <div id="main-content" class="row">
    <div id="content" class="col-sm-8"> 
      <div id="blog-detail">
        <h1><?php echo $bai_viet['0']['tieu_de'];?></h1>
        <div class="blog-head">
          <div class="sub-item"> <span class="item-date"><?php echo date('d F Y',$bai_viet['0']['ngay_tao']);?></span> <span class="item-author"><?php echo $bai_viet['0']['ten'];?></span> <span class="item-cmt">20</span> <span class="item-view"><?php echo $bai_viet['0']['luot_xem'];?></span> </div>
          <!--/.Subitem -->
          <div class="sharethis"> <span class='st_sharethis' displayText='ShareThis'></span>
<span class='st_facebook' displayText='Facebook'></span>
<span class='st_twitter' displayText='Tweet'></span>
<span class='st_linkedin' displayText='LinkedIn'></span>
<span class='st_pinterest' displayText='Pinterest'></span>
<span class='st_email' displayText='Email'></span>
<span class='st_googleplus' displayText='Google +'></span></div>
          <!--/.Share --> 
        </div>
        <div id="main_img"><img class="img-responsive" src="<?php echo ASSETS_URL; ?>upload/blog/<?php echo $bai_viet['0']['hinh_dai_dien']; ?>" width="750px" height="300px" /></div>
        <div id="blog-detail-content"> <?php echo $bai_viet['0']['noi_dung'];?> </div>
        <!--/.Blog Detail Content --> 
      </div>
      <?php $this->load->view('home/partial/author'); ?>
<!-- /.Author --> 
<!-- Related Blog -->
<?php $this->load->view('home/partial/related'); ?>
      <!-- Comment -->
<?php $this->load->view('home/partial/comment'); ?>
<div style="clear: both;"></div>
<!-- Leave Comment -->
<?php $this->load->view('home/partial/leave_comment'); ?>
    </div>
    <?php $this->load->view('home/partial/sidebar'); ?>
    <!-- /.Content --> 
    <!-- Leave Comment -->
    
    <!-- /.Leave Comment -->
    <div style="clear:both;"></div>
  </div>
  <!-- /.Main Content -->
  <div style="clear:both;"></div>
  
</div>
<!-- /.Wrapper -->
<div id="footer" class="container-fluid">Copyright &#64; ZoomWorld.vn 2015</div>
</body>
</html>