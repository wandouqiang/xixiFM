<div class="container" style="padding-top: 8%;">
	<div class="row">
		<div class="col-sm-offset-2 col-md-offset-3 col-xs-12 col-sm-8 col-md-6">

			<form class="form-horizontal" action="" method="post" role="form">
				<div class="form-group">
					<label for="inputSong" class="col-xs-4 control-label">网易音乐歌曲编号</label>
					<div class="col-xs-6">
						<input type="text" style="display: none;" />
						<input type="text" class="form-control" name="song" id="inputSong" value="<?php echo set_value('song'); ?>" placeholder="" autocomplete="off" maxlength="32" autofocus="true" required="true">
						<?php echo form_error('song'); ?>
					</div>
					<div class="col-xs-2">
						<button type="submit" class="btn btn-default">添加网易音乐</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

