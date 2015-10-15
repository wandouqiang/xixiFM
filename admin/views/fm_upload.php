<div class="container">

	<form class="form-horizontal" action="admin.php?c=upload&m=upload_file&type=picture" method="post" id="upload_form" enctype="multipart/form-data" role="form">
        <div class="col-xs-offset-4 col-xs-8">
	        <div class="form-group" style="margin-left: -5px;">
	      		<div class="fileUpload btn btn-info">
				    <span>上传图片</span>
				    <input id="upload_botton" name="userfile" type="file" class="upload" />
				</div>
				<input type="submit" class="hide"/>
				<span class="help-block"></span>
	        </div>
        </div>
	</form>

	<form class="form-horizontal" action="admin.php?c=" method="post" role="form">

		<div class="form-group">
			<label for="inputTitle" class="col-xs-4 control-label">标 题</label>
			<div class="col-xs-8">
				<input type="text" style="display: none;" />
				<input type="text" class="form-control" name="title" id="inputTitle" value="<?php echo set_value('title'); ?>" placeholder="" autocomplete="off" maxlength="32" autofocus="true" required="true">
				<span class="help-block"></span>
				<?php echo form_error('title'); ?>
			</div>
		</div>

		<div class="form-group">
			<label for="inputText" class="col-xs-4 control-label">描 述</label>
			<div class="col-xs-8">
				<textarea class="form-control" rows="8" name="text"></textarea>
				<span class="help-block"></span>
				<?php echo form_error('text'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-offset-4 col-xs-8">
				<button type="submit" class="btn btn-default">创 建</button>
			</div>
		</div>

	</form>

</div>

