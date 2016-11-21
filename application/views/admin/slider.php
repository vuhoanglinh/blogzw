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
            <header class="panel-heading"> <b>Slider</b> </header>
            <div class="panel-body">
              <form class="form-horizontal tasi-form" role="form" action="<?php echo site_url('admin/submit_slider'); ?>" method="post" role="form" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3">Chọn hình</label>
                <div class="controls col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="icon-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                    <input type="file" class="default" name="file">
                    </span> <span class="fileupload-preview" style="margin-left:5px;"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a> </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="noi_dung" class="col-lg-2 col-sm-2 control-label">Mô tả</label>
                  <div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="mo_ta" rows="6"></textarea>
                  </div>
                </div>
              <button type="submit" class="btn btn-success">Thêm</button>
            </form>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                      <header class="panel-heading"> <b>Danh Sách Slider</b> </header>
                      <table class="table table-striped table-advance table-hover">
                        <thead>
                          <tr>
                            <th> ID</th>
                            <th style="text-align:center"> Hình</th>
                            <th style="text-align:center"> Mô tả</th>
                            <th  style="text-align:center">Trạng Thái</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($danh_sach as $value){ ?>
                          <tr>
                            <td><?php echo $value['id']; ?></td>
                            
                            <td align="center"><?php echo '<img src="'.base_url().'assets/upload/slider/'.$value['image_name'].'"  width="200px" />'; ?></td>
                            <td><?php echo $value['mo_ta']; ?></td>
                            <td align="center"><a href="<?php echo site_url('admin/cap_nhat_trang_thai_slider?id='.$value['id']);?>"> <span class="label label-<?php if($value['trang_thai']==1){echo 'success';}else{echo 'danger';}?> label-mini">
                              <?php if($value['trang_thai']==0){echo "Không Hiển Thị";}else{echo "Hiển Thị";} ?>
                              </span></a></td>
                            
                            <td> <a onclick="return confirm('Bạn có chắc muốn xóa bài viết <?php echo $value['image_name']; ?> không ?')" href="<?php echo site_url('admin/xoa_slider?id='.$value['id']);?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      
                    </section>
                  </div>
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