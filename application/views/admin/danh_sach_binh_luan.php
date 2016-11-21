<?php $this->load->view("admin/partial/head");?>
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
            <header class="panel-heading"> <b>Tìm Kiếm Bình Luận</b> </header>
            <div class="panel-body">
              <form class="form-horizontal tasi-form" role="form" action="<?php echo site_url('admin/danh_sach_binh_luan'); ?>" method="get" >
                <div class="form-group">
                  <label for="tieu_de" class="col-lg-2 col-sm-2 control-label">Tên</label>
                  <div class="col-lg-6">
                    <input type="text" name="ten" class="form-control" id="ten" required value="<?php if(!empty($ten_tim_kiem)){echo $ten_tim_kiem;}?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trạng Thái</label>
                  <div class="col-lg-2">
                    <select name="trang_thai" class="form-control m-bot15">
                      <option value="2" <?php if(!empty($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 2){echo "selected";}?>> ALL</option>
                      <option value="1" <?php if(!empty($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 1){echo "selected";}?>> Hiển Thị</option>
                      <option value="0" <?php if(isset($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 0){echo "selected";}?>> Không Hiển Thị</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                <hr/>
                
                <!--start Table -->
                <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                      <header class="panel-heading"> <b>Danh Sách Bình Luận</b> </header>
                      <table class="table table-striped table-advance table-hover">
                        <thead>
                          <tr>
                            <th> Tên</th>
                            <th> Email	</th>
                            <th> Website</th>
                            <th> ID Bài Viết</th>
                            <th> Ngày Tạo</th>
                            <th> Trạng Thái</th>
                            <th>Xóa</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($danh_sach as $value){ ?>
                          <tr>
                            <td><?php echo $value['ten']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['website'];?></td>
                            <td><?php echo $value['id_bai_viet'] ?></td>
                            <td><?php echo $value['ngay_tao'] ?></td>
                            <td><a href="<?php echo site_url('admin/cap_nhat_trang_thai_binh_luan?id='.$value['id']);?>"><span class="label label-<?php if($value['trang_thai']==1){echo 'success';}else{echo 'danger';}?> label-mini">
                              <?php if($value['trang_thai']==0){echo "Không Hiển Thị";}else{echo "Hiển Thị";} ?>
                              </span></a></td>
                            
                            <td> <a onclick="return confirm('Bạn có chắc muốn xóa bài viết <?php echo $value['id']; ?> không ?')" href="<?php echo site_url('admin/xoa_binh_luan?id='.$value['id']);?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-lg-6"> </div>
                        <div class="col-lg-6">
                          <div class="dataTables_paginate paging_bootstrap pagination">
                            <ul>
                              <?php echo $pagination; ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
                <!--end table-->
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
<?php $this->load->view("admin/partial/foot");?>
</body>
</html>