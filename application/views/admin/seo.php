<?php $this->load->view('admin/partial/head');?>

<body>
<section id="container" class="">
  <?php $this->load->view('admin/partial/header');?>
  <?php $this->load->view('admin/partial/sidebar');?>
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <?php if(isset($_SESSION['error']) && $_SESSION['error']!=''){?>
      <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
        <?php echo $_SESSION['error'];?> </div>
      <?php 
			  unset($_SESSION['error']);
			  } ?>
      <?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
      <div class="alert alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button"> <i class="icon-remove"></i> </button>
        <?php echo $_SESSION['success']; ?> </div>
      <?php unset($_SESSION['success']); } ?>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> <b>SEO</b> </header>
            <div class="panel-body">
              <form action="<?php echo site_url('admin/submit_seo');?>" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" role="form">
                <div class="form-group">
                  <label for="title" class="col-lg-2 col-sm-2 control-label">Title</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="title" id="title" required value="<?php if(!empty($title)){echo $title;} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="description" id="description" value="<?php if(!empty($description)){echo $description;} ?>">
                  <p class="help-block">Nhập mô tả cho Website vui lòng không nhập quá 160 kí tự.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keywords" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="keywords" id="keywords" value="<?php if(!empty($keywords)){echo $keywords;} ?>">
                  </div>
                </div>
                <div class="form-group last">
                  <label class="col-lg-2 col-sm-2 control-label">Favicon</label>
                  <div class="col-md-4">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="max-width:200px"> 
                      <?php
								if(!empty($favicon))
								{
									echo '<img src="'.base_url().'assets/upload/favicon/'.$favicon.'" alt="" />';
								}
								else
								{
									echo "<img src='http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' alt='' />";
								}
						 ?>
                       </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="icon-paper-clip"></i> Chọn hình</span> <span class="fileupload-exists"><i class="icon-undo"></i> Thay đổi</span>
                        <input type="file" class="default" name="favicon"/>
                        </span> 
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Adsence</label>
                  <div class="col-lg-6">
                    <textarea class="form-control" name="adsence" id="adsence" cols="60" rows="5"> <?php if(!empty($adsence)){echo $adsence;} ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Google anlytics</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="google_anlytics" id="google_anlytics" value="<?php if(!empty($google_anlytics)){echo $google_anlytics;} ?>">
                    <p class="help-block">Vui lòng nhập mã Google Analytics. VD:UA-62896177-1.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Appid</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="appid" id="appid" value="<?php if(!empty($appid)){echo $appid;} ?>">
                    <p class="help-block">Vui lòng nhập mã App ID.</p>
                  </div>
                </div>
                <p align="center">
                  <button type="submit" class="btn btn-success">Cập nhật</button>
                  <button type="button" onclick="window.location.href='<?php echo site_url('admin/index');?>'" class="btn btn-default">Hủy</button>
                </p>
              </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>
  <!--main content end-->
  <?php $this->load->view('admin/partial/footer');?>
</section>
<?php $this->load->view('admin/partial/foot');?>
</body>
</html>