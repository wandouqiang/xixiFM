<div class="container">

	<form class="form-horizontal" action="admin.php?c=upload&m=upload_image" method="post" id="upload_form" enctype="multipart/form-data" role="form">
        <div class="col-xs-offset-2 col-xs-10">
	        <div class="form-group" style="margin-left: -10px;">
	      		<div class="fileUpload btn btn-info">
				    <span>上传图片</span>
				    <input id="upload_botton" name="userfile" type="file" class="upload" />
				</div>
				<input type="submit" class="hide"/>
				<span class="help-block"></span>
	        </div>
        </div>
	</form>

	<form class="form-horizontal" action="" method="post" role="form">

		<div class="form-group">
			<label for="inputTitle" class="col-xs-2 control-label">图 片</label>
			<div class="col-xs-8">
				<input type="text" name="picture" id="pic-source" value="dist/images/base-004.jpg" style="display: none;" />
				<img src="dist/images/base-004.jpg" id="picture" class="img-responsive" alt="标题">
				<span class="help-block"></span>
				<?php echo form_error('picture'); ?>
			</div>
		</div>

		<div class="form-group">
			<label for="inputTitle" class="col-xs-2 control-label">标 题</label>
			<div class="col-xs-8">
				<input type="text" class="form-control" name="title" id="inputTitle" value="<?php echo set_value('title'); ?>" placeholder="" autocomplete="off" maxlength="32" autofocus="true" required="true">
				<span class="help-block"></span>
				<?php echo form_error('title'); ?>
			</div>
		</div>

		<div class="form-group">
			<label for="inputMoods" class="col-xs-2 control-label">标 签</label>
			<div class="col-xs-8">
				<input type="text" class="form-control" name="moods" id="inputMoods" placeholder="" value="<?php echo set_value('moods'); ?>" autocomplete="off" maxlength="32">
				<span class="help-block"></span>
				<?php echo form_error('moods'); ?>
			</div>
			<div class="col-xs-offset-2 col-xs-8">
				<?php foreach ($this->config->item('moods') as $mood): ?>
					<span class="label label-default song-mood"><?php echo $mood ?></span>
				<?php endforeach; ?>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputText" class="col-xs-2 control-label">描 述</label>
			<div class="col-xs-8">
				<textarea class="form-control" rows="4" name="text"></textarea>
				<span class="help-block"></span>
				<?php echo form_error('text'); ?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-2 control-label">网易云音乐</label>
			<div class="col-xs-4">
				<input type="text" class="form-control" id="album" placeholder="网易云音乐专辑编号" autocomplete="off" maxlength="32">
			</div>
			<div class="col-xs-4">
				<input type="text" class="form-control" id="playlist" placeholder="网易云音乐歌单编号" autocomplete="off" maxlength="32">
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
				<button class="btn btn-default" id="yun" type="button">添 加</button>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputSong" class="col-xs-2 control-label">歌 曲</label>
			<div class="col-xs-8">
				<input type="text" class="hide" name="song" value="<?php echo set_value('song'); ?>">
				<div class="add-music-song songshow hide">
					<ul></ul> 
		        </div>
				<span class="help-block"></span>
				<input type="text" class="form-control" id="inputSong"  placeholder="歌曲名">
				<span class="help-block"></span>
				<div class="scrollspy-example">
					<table class="table">
						<tbody>
						</tbody>
					</table>
				</div>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
				<button type="submit" class="btn btn-default">创 建</button>
			</div>
		</div>

	</form>



</div>

