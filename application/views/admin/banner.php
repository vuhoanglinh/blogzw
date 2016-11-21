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
        <section class="panel">
          <header class="panel-heading"> Hình ảnh Banner </header>
          <div class="panel-body">
          <p>
          <br/>
          <?php 
          if($banner != '')
		{
			echo '<img src="'.base_url().'assets/upload/banner/'.$banner.'" alt="" />';
		}?></p><br/><br/><br/>
            <form class="form-horizontal tasi-form" role="form" action="<?php echo site_url('admin/submit_banner'); ?>" method="post" role="form" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3">Thay đồi hình</label>
                <div class="controls col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="icon-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                    <input type="file" class="default" name="file">
                    </span> <span class="fileupload-preview" style="margin-left:5px;"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a> </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Thêm</button>
            </form>
          </div>
        </section>
      </div>
    </section>
  </section>
  <!--main content end-->
  <?php $this->load->view('admin/partial/footer');?>
</section>
<?php $this->load->view('admin/partial/foot');?>
</body>
</html>