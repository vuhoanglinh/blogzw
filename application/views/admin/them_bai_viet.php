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
                              <b>Thêm Bài Viết</b>
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form"  action="<?php echo site_url('admin/submit_them_bai_viet'); ?>" enctype="multipart/form-data" method="post" role="form">																	  						
								  <div class="form-group">
                                      <label for="tieu_de" class="col-lg-2 col-sm-2 control-label">Tiêu Đề</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="tieu_de" id="tieu_de" placeholder="Tiêu Đề Bài Viết" required>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Loại</label>
                                      <div class="col-lg-4">
                                          <select name="id_loai" class="form-control m-bot15">
											<?php foreach($ds_loai as $value){ ?>
											
                                              <optgroup label="<?php echo $value['detail']['ten_loai']; ?>">
												<?php if($value['count_child'] > 0){ ?>
													<?php foreach($value['child'] as $child){ ?>
														<option value="<?php echo $child['id']; ?>"><?php echo $child['ten_loai']; ?> </option>
													<?php } ?>
												<?php } ?>
											  </optgroup> 
											<?php } ?>
                                          </select>                                        
                                      </div>
                                  </div>
								    <div class="form-group">
                                       <label for="noi_dung" class="col-lg-2 col-sm-2 control-label">Nội Dung</label>
										<div class="col-lg-10">
											   <textarea class="form-control ckeditor" name="noi_dung" rows="6"></textarea>
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
								   <p align="center">
										<button type="submit" class="btn btn-success">Thêm Bài Viết</button>
										<button type="button" onclick="window.location.href='<?php echo site_url('admin/danh_sach_bai_viet');?>'" class="btn btn-default">Hủy</button>		
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
