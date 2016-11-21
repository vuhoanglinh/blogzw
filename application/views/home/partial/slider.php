<div id="slider">
	<!-- Content slider -->
	<?php if($slider != null){ ?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		<?php $i=0; ?>
		<?php foreach($slider as $item){ ?>
		  <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0 ){ echo 'class="active"'; } ?>></li>		  
		<?php $i++; ?>
		<?php } ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php $i=0; ?>
			<?php foreach($slider as $item){ ?>
			  <div class="item  <?php if($i == 0 ){ echo ' active'; } ?>">
				<img src="<?php echo ASSETS_URL; ?>upload/slider/<?php echo $item['image_name']; ?>" alt="<?php echo $item['mo_ta']; ?>"  alt="" class="img-responsive">
			  </div>
			<?php $i++; ?>
			<?php } ?>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>
	<?php } ?>
	<!-- /.Content slider -->
</div><!-- /.Slider -->