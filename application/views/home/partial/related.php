<?php 
	if(count($related) > 0){
?>
<div id="related_post">
					<h4 class="title-head">RELATED BLOG</h4>
					<div  class="hr-author"><img src="<?php echo ASSETS_URL.'home/'; ?>img/hr_related.jpg" class="img-responsive" /></div>
					<div id="related_post_content">
					<?php foreach($related as $value){?>
						<div class="item-related">
							<div class="img-item-related">
								<a href="<?php echo site_url('blog/'.$value['page_url']); ?>" title="<?php echo $value['tieu_de'];?>"><img src="<?php echo ASSETS_URL; ?>upload/blog/a.jpg" alt="<?php echo $value['tieu_de'];?>" width="98px" height="80px" /></a>								
							</div>
							<div class="content-item-related">
								<h5><a href="<?php echo site_url('blog/'.$value['page_url']); ?>" title="<?php echo $value['tieu_de'];?>"><?php echo $value['tieu_de'];?></a></h5>
								<span>
									<?php echo substr($value['noi_dung'],0,100)."...";?>
								</span>
								<div class="sub-item">
									<span class="item-date"><?php echo date('d F Y',$value['ngay_tao']);?></span>							
									<span class="item-cmt">20</span>							
								</div><!--/.Subitem -->
							</div>
							
						</div><!--Item Related Post--> 
					<?php } ?>
						
						
						<div style="clear: both;"></div>
					</div><!--Content Related Post--> 
				</div><!-- /.Related Post-->
<?php } ?>