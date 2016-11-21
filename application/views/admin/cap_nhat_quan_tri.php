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
							 Cập Nhật Quản Trị
						  </header>
						  <div class="panel-body">
							  <form class="form-horizontal tasi-form"  action="<?php echo site_url('admin/submit_cap_nhat_quan_tri'); ?>" method="post" role="form">								
								  <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $quan_tri['id']; ?>">								 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Tên</label>
									  <div class="col-sm-4">
										  <input class="form-control" name="ten" type="text" value="<?php echo $quan_tri['ten']; ?>" disabled >
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Username</label>
									  <div class="col-sm-4">
										  <input class="form-control" name="username" type="text" value="<?php echo $quan_tri['username']; ?>" disabled >
									  </div>
								  </div>															 
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trạng Thái</label>
                                      <div class="col-lg-4">
                                          <select name="trang_thai" class="form-control m-bot15">											  									
											  <option value="1" <?php if($quan_tri['trang_thai']== 1){ echo 'selected="selected"';}?> > Hoạt Động </option>
											  <option value="0" <?php if($quan_tri['trang_thai']== 0){ echo 'selected="selected"';} ?> > Không Hoạt Động </option>                                                                                         
                                          </select>                                        
                                      </div>
                                  </div>	
									<div class="form-group">
                                      <label for="re_password" class="col-lg-2 col-sm-2 control-label">Giới thiệu</label>
                                      <div class="col-lg-6">
                                          <textarea name="gioi_thieu" class="form-control ckeditor" rows="6"  style="visibility: hidden; display: none;"><?php echo $quan_tri['gioi_thieu']; ?></textarea>
                                          
                                      </div>
                                  </div>								  
								  <p align="center"><button type="submit" class="btn btn-success">Cập Nhật</button>
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
 
