<style>
	.err {
		color: red;
		font-style: italic;
		font-size:12px;	
		display: none;		
	}
</style>
<div id="leave-comment">
	<h4>LEAVE A REPLY<span class="french"></span></h4>
	<div id="content-leave-comment">
		<form method="post" action="<?php echo site_url('home/leave_comment'); ?>" onsubmit="return check_require()">
			<input type="hidden" name="id_bai_viet" value="<?php echo $bai_viet['0']['id'];?>" />
			<input type="hidden" name="url_ref" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
			<p class="form-comp">
				<input type="text" name="ten" id="name" placeholder="Name (required)"/><span id="r_name" class="err">This feild is required</span>
			</p>
			<p class="form-comp">
				<input type="email" name="email" id="email" placeholder="Email (required)"/><span id="r_email" class="err">This feild is required</span>
			</p>
			<p class="form-comp">
				<input type="text" name="website" placeholder="Website"/>
			</p>
			<p class="form-comp">
				<input type="text" name="title" id="title" size="60" placeholder="Title (required)"/><span id="r_title" class="err">This feild is required</span>
			</p>
			<p class="form-comp">
				<span id="r_comment" class="err">This feild is required</span>
				<textarea name="comment" id="comment" placeholder="Comment (required)"></textarea>
			</p>
			<p class="form-comp">
				<input type="submit" value="Submit Comment" />
			</p>
		</form>
	</div>
</div><!-- Leave Comment -->
<script>
	function check_require(){
		var flag = 0;
		if($('#name').val() == ''){
			$('#r_name').show();
			flag = 1;
		}else{
			$('#r_name').hide();
		}
		if($('#email').val() == ''){
			$('#r_email').show();
			flag = 1;
		}else{
			$('#r_email').hide();
		}
		if($('#title').val() == ''){
			$('#r_title').show();
			flag = 1;
		}else{
			$('#r_title').hide();
		}
		if($('#comment').html() == ''){
			$('#r_comment').show();
			flag = 1;
		}else{
			$('#r_comment').hide();
		}
		if(flag == 1){
			return false;
		}else{
			return true;
		}
	}
</script>