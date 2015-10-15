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
				<h5><strong><span>头 像</span></strong></h5>
			</a>
		</div>

		<div class="col-xs-4 col-md-2">
			<a href="index.php?c=users&m=password">
				<h5><strong><span class="user-love">密 码</span></strong></h5>
			</a>
		</div>
	</div>
	<hr>

	<form class="password" action="" method="post" role="form">
		<div class="form-group">
			<label for="inputHave">旧密码</label>
			<input type="password" class="form-control" name="have" id="inputHave" placeholder="" maxlength="18" autocomplete="off" autofocus="true" required="true">
			<?php echo form_error('have'); ?>
		</div>
		<div class="form-group">
			<label for="inputPassword">新密码</label>
			<input type="password" class="form-control" name="password" id="inputPassword" placeholder="" maxlength="18" autocomplete="off" required="true">
			<?php echo form_error('password'); ?>
		</div>
		<div class="form-group">
			<label for="inputPasscof">确认新密码</label>
			<input type="password" class="form-control" name="passconf" id="inputPasscof" placeholder="" maxlength="18" autocomplete="off" required="true">
			<?php echo form_error('passconf'); ?>
		</div>
		<button type="submit" class="btn btn-default">保 存</button>
	</form>
	
</div>