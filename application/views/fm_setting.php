<div class="container">
	<h4>设置个人信息</h4>
	<div class="row">
		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=setting">
				<h5><strong><span class="user-love">信 息</span></strong></h5>
			</a>
		</div>
		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=avatar">
				<h5><strong><span>头 像</span></strong></h5>
			</a>
		</div>

		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=password">
				<h5><strong><span>密 码</span></strong></h5>
			</a>
		</div>
	</div>

	<hr>

	<form class="password" action="" method="post" role="form">
		<div class="form-group">
			<label for="inputName">名称</label>
			<input type="text" class="form-control" name="name" id="inputName" value="<?php echo $username ?>" placeholder="" disabled maxlength="18" autocomplete="off" autofocus="true" required="true">
		</div>
		<div class="form-group">
			<label for="inputEmail">邮箱</label>
			<input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $email ?>" placeholder="" disabled>
		</div>
		<div class="form-group">
			<label for="inputPhone">手机</label>
			<input type="text" class="form-control" name="phone" id="inputPhone" value="<?php echo $phone ?>" placeholder="" maxlength="11" autocomplete="off" autofocus="true" required="true">
			<?php echo form_error('phone'); ?>
		</div>
		<div class="form-group">
			<label for="inputNice">昵称</label>
			<input type="text" class="form-control" name="nicename" id="inputNice" value="<?php echo $nicename ?>" placeholder="" maxlength="5" autocomplete="off" required="true">
			<?php echo form_error('nicename'); ?>
		</div>
		<button type="submit" class="btn btn-default">保 存</button>
	</form>
	
</div>