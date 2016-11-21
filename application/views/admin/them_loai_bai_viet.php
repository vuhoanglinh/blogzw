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
                              <b>Thêm Loại Bài Viết</b>
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" action="<?php echo site_url('admin/submit_them_loai_bai_viet'); ?>" method="post" role="form">							  														
								
								<div class="form-group">							
								  <label for="ten_loai" class="col-lg-2 col-sm-2 control-label">Tên Loại</label>
								  <div class="col-lg-6">
									  <input type="text" class="form-control" name="ten_loai" id="ten_loai" placeholder="Nhập Tên Loại" required>
									  
								  </div>
                                </div>
								  					    
								
								 
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trạng Thái</label>
                                      <div class="col-lg-2">
                                          <select name="trang_thai" class="form-control m-bot15">
											  <option value="1"> Hiển Thị</option>
                                              <option value="0"> Không Hiển Thị</option>
                                                                                          
                                          </select>                                        
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Xóa</label>
                                      <div class="col-lg-2">
                                          <select name="xoa" class="form-control m-bot15">
											  <option value="0"> Không</option>
                                              <option value="1"> Có</option>
                                                                                          
                                          </select>                                        
                                      </div>
                                  </div>
								<div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Mã Loại Cha</label>
                                      <div class="col-lg-2">
                                          <select name="ma_loai_cha" class="form-control m-bot15">
											  <option value="0"> ---- Loại Cha ---</option>
                                              <?php foreach($ds_loai as $value){ ?>
											  <option value="<?php echo $value['id']; ?>" ><?php echo $value['ten_loai']; ?></option>
                                              <?php } ?>                                        
                                          </select>                                        
                                      </div>
                                </div>
								  
								   <p align="center"><button type="submit" class="btn btn-success">Thêm</button>
													<button type="button" onclick="window.location.href='<?php echo site_url('admin/danh_sach_loai_bai_viet');?>'" class="btn btn-default">Hủy</button>
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
