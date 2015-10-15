<div class="container">
	<h4>设置个人信息</h4>
	<div class="row">
		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=setting">
				<h5><strong><span>信 息</span></strong></h5>
			</a>
		</div>
		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=avatar">
				<h5><strong><span class="user-love">头 像</span></strong></h5>
			</a>
		</div>

		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=password">
				<h5><strong><span>密 码</span></strong></h5>
			</a>
		</div>
	</div>

	<hr>

	<div class="row user">
		<p style="padding-left:15px;">个人头像</p>
		<?php foreach ( $this->config->item('user_avatar') as $key => $value ): ?>
		<div class="col-xs-2 col-md-1" style="margin-top: 10px;">
			<img src="<?php echo $value ?>" class="avatar cursor <?php if($value == $avatar) { echo 'active'; } ?>" data-avatar="<?php echo $key ?>">
		</div>
		<?php endforeach; ?>
	</div>

	<hr>

	<div class="row user">
		<p style="padding-left:15px;">个人主页背景图</p>
		<?php foreach ( $this->config->item('user_image_th') as $key => $value ): ?>
		<div class="col-xs-6 col-md-3" style="margin-top: 10px;">
			<img src="<?php echo $value ?>" class="image cursor <?php if($this->config->item('user_image')[$key] == $image) { echo 'active'; } ?>" data-image="<?php echo $key ?>">
		</div>
		<?php endforeach; ?>
	</div>

	<hr>
	
</div>