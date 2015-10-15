<div class="container">
	<div class="row">
	    <div class="col-xs-12">
	    	<img src="<?php echo $user_image ?>" class="img-responsive">
	    </div>
	    <div class="col-xs-12 text-center" style="margin-top: -50px;">
	    	<img src="<?php echo $user_avatar ?>" class="img-circle user-image" width="100">
	    </div>

	   	<div class="col-xs-12 text-center" style="margin-top: 20px;">
	    	<h4><span class="user-name"><?php echo $username ?></span></h4>
	    	<p>累计听歌：<?php echo $user_counts ?></p>
	    	<p>注册时间：<?php echo $registered ?></p>
	    	<p>最后登录：<?php echo $last_login ?></p>
	    	<?php if( $username == $this->session->userdata('username') ): ?>
	    	<p><a href="index.php?c=users&m=setting"><i class="fa fa-2x fa-cog"></i></a></p>
	    	<?php endif; ?>
	    	<p><a href="<?php echo base_url() ?>">Home</a></p>
	    </div>

	    <div class="col-xs-12" style="margin-top: 40px;">
	    	<div class="row">
	    		<div class="col-xs-4 col-md-2">
	    			<a href="index.php?c=users&m=musics&name=<?php echo $username ?>">
	    				<h5><strong><span class="<?php if($active == 'music') { echo 'user-love'; } ?>">期 刊</span></strong></h5>
	    			</a>
	    		</div>
	    		<div class="col-xs-4 col-md-2">
	    			<a href="index.php?c=users&m=songs&name=<?php echo $username ?>">
	    				<h5><strong><span class="<?php if($active == 'song') { echo 'user-love'; } ?>">单 曲</span></strong></h5>
	    			</a>
	    		</div>

	    	</div>
	    </div>