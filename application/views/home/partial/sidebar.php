<div id="sidebar" class="col-sm-4">			
	<div id="logo">
		<a href="<?php echo site_url(); ?>"><img src="<?php echo ASSETS_URL.'home/'; ?>img/logo.png" id="img-logo"/></a>
	</div><!-- /.Logo -->
	<div id="search">
		<form id="form_search" action="<?php echo site_url('search'); ?>" method="get" >
			<input name="tu_khoa" id="input-search" type="text" placeholder="Search..." />
			<button class="btn btn-default" type="submit" style="  border: 0px;background: transparent;border-radius: 50%;outline:none;"><i class="glyphicon glyphicon-search"></i></button>
		</form>
	</div><!-- /.Search -->
	<div class="block">
		<div id="nav">
			<div id="accordion">
				<?php foreach($ds_loai as $value) { ?>
				<h3><?php
							echo $value['detail']['ten_loai'];											
						
				?><span class="num-accordion">(<?php echo $value['total_post'];?>)</span></h3>
				
				
				<div>
				<?php if($value['child']!= NULL){ ?>
					<ul>
					 <?php foreach($value['child'] as $child_item){ ?>
					  <li><a href="<?php echo site_url('loai/'.$child_item['page_url']); ?>"><?php echo $child_item['ten_loai']; ?></a></li>							
					  
					 <?php } ?>
					</ul>
				<?php } ?>
				</div>
				
				
				<?php 				
				} ?>
				<!--<h3>Truyện Cười <span class="num-accordion">(10)</span></h3>
				<div>
					<ul>
					  <li><a href="">Miền Nam</a></li>
					  <li><a href="">Miền Trung</a></li>
					  <li><a href="">Miền Bắc</a></li>
					</ul>
				</div>
				<h3>Tiểu Thuyết <span class="num-accordion">(7)</span></h3>
				<div>
					<ul>
					  <li><a href="">Tình Cảm</a></li>
					  <li><a href="">Kiếm Hiệp</a></li>
					  <li><a href="">Tiên Hiệp</a></li>							 
					</ul>
				</div>
				-->
			</div>
			 <script>
			 $(document).ready(function(){
				$( "#accordion" ).accordion({
				  heightStyle: "content",
				  collapsible: true,						  
				  animated: 'slide',						  
				  navigation: true,
				  active: true
				});						
			  });
			  </script>
		</div><!-- /.Navigation -->
	</div><!-- /.Block -->
	<?php $this->load->view('home/partial/block_most_comment'); ?>
	<div style="clear:both;"></div>
</div><!-- /.Sidebar -->