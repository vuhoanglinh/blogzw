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
            <header class="panel-heading"> <b>Tìm Kiếm Bài Viết</b> </header>
            <div class="panel-body">
              <form class="form-horizontal tasi-form" role="form" action="<?php echo site_url('admin/danh_sach_bai_viet'); ?>" method="get" >
                <div class="form-group">
                  <label for="tieu_de" class="col-lg-2 col-sm-2 control-label">Tiêu Đề</label>
                  <div class="col-lg-6">
                    <input type="text" name="tieu_de" class="form-control" id="tieu_de" required value="<?php if(!empty($tieu_de_tim_kiem)){echo $tieu_de_tim_kiem;}?>">
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
                      <header class="panel-heading"> <b>Danh Sách Bài Viết</b> </header>
                      <table class="table table-striped table-advance table-hover">
                        <thead>
                          <tr>
                            <th> ID</th>
                            <th> Tiêu Đề</th>
                            <th> Loại</th>
                            <th class="hidden-phone">Ngày Tạo</th>
                            <th> Trạng Thái</th>
                            <th>Xóa</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($danh_sach as $value){ ?>
                          <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['tieu_de']; ?></td>
                            <td><?php echo $danh_sach_loai[ $value['id_loai'] ]; ?></td>
                            <td class="hidden-phone"><?php echo date('d-m-Y',$value['ngay_tao']); ?></td>
                            <td><a href="<?php echo site_url('admin/cap_nhat_trang_thai_bai_viet?id='.$value['id']);?>"><span class="label label-<?php if($value['trang_thai']==1){echo 'success';}else{echo 'danger';}?> label-mini">
                              <?php if($value['trang_thai']==0){echo "Không Hiển Thị";}else{echo "Hiển Thị";} ?>
                              </span></a></td>
                            <td><a href="<?php echo site_url('admin/cap_nhat_trang_thai_xoa_bai_viet?id='.$value['id']);?>"><span class="label label-<?php if($value['xoa']==1){echo 'warning';}else{echo 'primary';}?> label-mini">
                              <?php if($value['xoa']==1){echo 'Có';}else{echo 'Không';}?>
                              </span></a></td>
                            <td><a href="<?php echo site_url('admin/cap_nhat_bai_viet?id_bv='.$value['id']);?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a> <a onclick="return confirm('Bạn có chắc muốn xóa bài viết <?php echo $value['tieu_de']; ?> không ?')" href="<?php echo site_url('admin/xoa_bai_viet?id='.$value['id']);?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
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