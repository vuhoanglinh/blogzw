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
							 Thêm Quản Trị
						  </header>
						  <div class="panel-body">
							  <form class="form-horizontal tasi-form"  action="<?php echo site_url('admin/submit_them_quan_tri'); ?>" method="post" role="form" enctype="multipart/form-data">
									
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Họ và Tên</label>
                                      <div class="col-lg-6">                                                                             
                                          <input type="text" class="form-control" name="ten" id="ten" required>                                                                         
                                      </div>
                                  </div>								
								  <div class="form-group">
                                      <label for="username" class="col-lg-2 col-sm-2 control-label">Tên Truy Cập</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="username" id="username" required>
                                      </div>
                                  </div>
									<div class="form-group">
                                      <label for="password" class="col-lg-2 col-sm-2 control-label">Mật Khẩu</label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" name="password" id="password" required>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label for="re_password" class="col-lg-2 col-sm-2 control-label">Xác Nhận Mật Khẩu</label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" name="re_password" id="re_password" required>
                                      </div>
                                  </div>	
                                  <div class="form-group">
                                      <label for="re_password" class="col-lg-2 col-sm-2 control-label">Giới thiệu</label>
                                      <div class="col-lg-6">
                                          <textarea name="gioi_thieu" class="form-control ckeditor" rows="6"  style="visibility: hidden; display: none;"></textarea>
                                          
                                      </div>
                                  </div>																				
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trạng Thái</label>
                                      <div class="col-lg-4">
                                          <select name="trang_thai" class="form-control m-bot15">
											  <option value="0"> Không Hoạt Động</option>
                                              <option value="1"> Hoạt Động</option>                                                                                        
                                          </select>                                        
                                      </div>
                                  </div>
								  	  
								  <div class="form-group last">
                                          <label class="col-lg-2 col-sm-2 control-label">Hình Đại Diện</label>
                                          <div class="col-md-4">
                                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
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
									  
								   <p align="center"><button type="submit" class="btn btn-success">Thêm Quản Trị</button>
													<button type="button" onclick="window.location.href='<?php echo site_url('admin/danh_sach_quan_tri');?>'" class="btn btn-default">Hủy</button>		
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
	
	