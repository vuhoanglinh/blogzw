<?php if($count_cmt > 0){ ?>
<div id="comment">
	<h4>COMMENT (<?php echo $count_cmt; ?>)<span class="french"></span></h4>
	<div id="comment-content">
		<?php foreach($ds_comment as $comment){ ?>
		<div class="item-comment">
			<div class="comment_img"><img src="<?php echo ASSETS_URL.'home/'; ?>img/logo_authorl.png" /></div>
			<div class="comment_desc">
				<h4><?php if(!empty($comment['title'])){echo $comment['title'];} ?></h4>
				<div class="detail_comment">
					<?php echo $comment['noi_dung']; ?> 
					<div class="sub-item">
						<span class="item-date"><?php echo date('d F Y',$comment['ngay_tao']); ?></span>																	
					</div><!--/.Subitem -->
				</div>									
			</div>
			<div style="clear: both;"></div>
		</div><!--Item Comment-->	
		<?php } ?>
	</div><!-- Content Comment-->
	<div style="clear: both;"></div>
</div><!-- Comment-->
<?php } ?>