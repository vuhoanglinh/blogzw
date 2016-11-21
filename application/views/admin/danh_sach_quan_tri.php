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
            <header class="panel-heading"> <b>Tìm Kiếm Quản Trị</b> </header>
            <div class="panel-body">
              <form class="form-horizontal tasi-form" role="form" action="<?php echo site_url('admin/danh_sach_quan_tri'); ?>" method="get">
                <div class="form-group">
                  <label for="ten" class="col-lg-2 col-sm-2 control-label">Tên</label>
                  <div class="col-lg-4">
                    <input type="text" name="ten" class="form-control input-small" id="ten" value="<?php if(!empty($ten_tim_kiem)){echo $ten_tim_kiem;}?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trạng Thái</label>
                  <div class="col-lg-2">
                    <select name="trang_thai" class="form-control m-bot15">
                      <option value="2" <?php if(!empty($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 2){echo "selected";}?>>ALL</option>
                      <option value="0" <?php if(isset($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 0){echo "selected";}?>>Không Hoạt Động</option>
                      <option value="1" <?php if(!empty($trang_thai_tim_kiem) && $trang_thai_tim_kiem == 1){echo "selected";}?>>Hoạt Động</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                <hr/>
                
                <!--start Table -->
                <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                      <header class="panel-heading"> <b>Danh Sách Quản Trị</b> </header>
                      <table class="table table-striped table-advance table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Username</th>
                            <th class="hidden-phone">Ngày Tạo</th>
                            <th>Trạng Thái</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($ds_quan_tri as $value){?>
                          <tr>
                            <td><a href="#"><?php echo $value['id'];?></a></td>
                            <td><?php echo $value['ten'];?></td>
                            <td><?php echo $value['username'];?></td>
                            <td class="hidden-phone"><?php echo date('d-m-Y',$value['ngay_tao']);?></td>
                            <td><span class="label label-<?php if($value['trang_thai']==1){echo 'success';}else{echo 'danger';}?> label-mini">
                              <?php if($value['trang_thai']==1){echo 'Hoạt Động';}else{echo 'Không Hoạt Động';}?>
                              </span></td>
                            <td><a href="<?php echo site_url('admin/cap_nhat_quan_tri?id_quan_tri='.$value['id']);?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a> <a onclick="return confirm('Bạn Có Chắc Muốn Xóa ID <?php echo $value['id']; ?> Không ?')" href="<?php echo site_url('admin/xoa_quan_tri?id='.$value['id']); ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
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
<?php $this->load->view('admin/partial/foot');?>
</body>
</html>