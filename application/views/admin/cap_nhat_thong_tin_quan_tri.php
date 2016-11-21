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
				  <button data-dismiss="alert" class="close close-sm" type="button">
					  <i class="icon-remove"></i>
				  </button>
				  <?php echo $_SESSION['error'];?>
			  </div><?php 
			  unset($_SESSION['error']);
			  } ?>
			<?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){?><div class="alert alert-success fade in">
			  <button data-dismiss="alert" class="close close-sm" type="button">
				  <i class="icon-remove"></i>
			  </button>
			   <?php echo $_SESSION['success']; ?>
		  </div><?php unset($_SESSION['success']); } ?>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
						  <header class="panel-heading">
							 <b>Thiết lập tài khoản</b>
						  </header>
						  <div class="panel-body">
							  <form class="form-horizontal tasi-form"  action="<?php echo site_url('admin/submit_cap_nhat_thong_tin_quan_tri'); ?>" method="post" role="form" enctype="multipart/form-data">
								<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $admin_info['id']; ?>">
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Họ và Tên</label>
                                      <div class="col-lg-4">                                                                             
                                          <input type="text" class="form-control" name="ten" id="ten" value="<?php echo $admin_info['ten']; ?>" required>                                                                         
                                      </div>
                                  </div>																  
									<div class="form-group">
                                      <label for="password" class="col-lg-2 col-sm-2 control-label">Mật Khẩu</label>
									  <span style="color:red;">* Đổi Lại Mật Khẩu (Nếu Muốn)</span>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" name="password" id="password">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label for="re_password" class="col-lg-2 col-sm-2 control-label">Xác Nhận Mật Khẩu</label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" name="re_password" id="re_password">
                                      </div>
                                  </div>																															  								 
								  <div class="form-group last">
                                          <label class="col-lg-2 col-sm-2 control-label">Hình Đại Diện</label>
                                          <div class="col-md-4">
                                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="max-width: 200px; ">
                                                      <?php
								if($admin_info['hinh_dai_dien'] != '')
								{
									echo '<img src="'.base_url().'assets/upload/user/'.$admin_info['hinh_dai_dien'].'" alt="" />';
								}
								else
								{
									echo "<img src='http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' alt='' />";
								}
						 ?>
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Chọn hình</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Thay đổi</span>
                                                   <input type="file" class="default" name="hinh_dai_dien"/>
                                                   </span>
                                                      <!--<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Xóa</a>-->
                                                  </div>
                                              </div>
                                              
                                          </div>
                                  </div>	
										 <div class="form-group">
                                      <label for="re_password" class="col-lg-2 col-sm-2 control-label">Giới thiệu</label>
                                      <div class="col-lg-6">
                                          <textarea name="gioi_thieu" class="form-control ckeditor" rows="6"  style="visibility: hidden; display: none;"><?php echo $admin_info['gioi_thieu']; ?></textarea>
                                          
                                      </div>
                                  </div>
								   <p align="center"><button type="submit" class="btn btn-success">Cập Nhật</button>
													<button type="button"  class="btn btn-default">Hủy</button>		
									</p>
                              </form>
						  </div>
					 </section>
 
				</div>
			</div>
		</section>
	  </section>
		<?php $this->load->view('admin/partial/footer');?>
		
</section>
	<?php $this->load->view('admin/partial/foot');?>

	 </body>
</html>
	
	