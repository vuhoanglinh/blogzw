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
      <!-- Slider -->
      <?php $this->load->view('home/partial/slider'); ?>
      <!-- /.Slider --> 
      <!-- Slider -->
      <?php $this->load->view('home/partial/banner'); ?>
      <!-- /.Slider -->
      <div id="list">
        <?php foreach($danh_sach as $bai_viet){ ?>
        <div class="item-blog">
          <div class="item-blog-img">
			<a href="<?php echo site_url('blog')."/".$bai_viet['page_url']; ?>" title="<?php echo $bai_viet['tieu_de']; ?>">
				<img src="<?php echo ASSETS_URL; ?>upload/blog/<?php echo $bai_viet['hinh_dai_dien']; ?>" alt="<?php echo $bai_viet['tieu_de']; ?>" class="img-responsive" />
			</a>
		  </div>
          <div class="item-blog-content">
            <h4><a href="<?php echo site_url('blog')."/".$bai_viet['page_url']; ?>" title="<?php echo $bai_viet['tieu_de']; ?>"><?php echo $bai_viet['tieu_de']; ?></a></h4>
            <div class="item-blog-content-short">
              <div class="sub-item"> <span class="item-date"><?php echo date('d-m-Y',$bai_viet['ngay_tao']);?></span> <span class="item-author"><?php echo $bai_viet['ten'];?></span> <span class="item-cmt"><?php echo $bai_viet['count_comment']; ?></span> <span class="item-view"><?php echo $bai_viet['luot_xem'];?></span> </div>
              <p> <?php echo substr($bai_viet['noi_dung'],0,300); ?> </p>
            </div>
          </div>
        </div>
        <!-- /.Item Blog -->
        <?php } ?>
      </div>
      <!-- /.List blog -->
      <?php if($pagination != ''){ ?>
      <div id="pagination-blog">
        <ul>
          <li id="show-page">Page <?php echo $curr_page; ?> of <?php echo $max_page; ?></li>
          <?php  echo $pagination; ?>
        </ul>
      </div>
      <?php } ?>
    </div>
    <!-- /.Content --> 
    <!-- Slider -->
    <?php $this->load->view('home/partial/sidebar'); ?>
    <!-- /.Slider -->
    <div style="clear:both;"></div>
  </div>
  <!-- /.Main Content -->
  <div style="clear:both;"></div>
</div>
<!-- /.Wrapper -->
<div id="footer" class="container-fluid">Copyright &#64; ZoomWorld.vn 2015</div>
</body>
</html>