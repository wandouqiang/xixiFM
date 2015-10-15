<div class="container">

	<form class="form-horizontal" action="admin.php?c=song&m=update_song" method="post" role="form">

		<input type="text" class="hide" name="song-id" value="<?php echo $id ?>" readonly>
		<div class="form-group">
			<label for="inputName" class="col-xs-2 control-label">名 称</label>
			<div class="col-xs-8">
				<input type="text" class="form-control" name="song-name" id="inputName" value="<?php echo $name ?>" placeholder="" maxlength="32" autofocus="true" required="true">
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputAuthor" class="col-xs-2 control-label">歌 手</label>
			<div class="col-xs-8">
				<input type="text" class="form-control" name="song-author" id="inputAuthor" value="<?php echo $authors ?>" maxlength="64">
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputPath" class="col-xs-2 control-label">地 址</label>
			<div class="col-xs-8">
				<input type="text" class="form-control" name="song-path" id="inputPath" value="<?php echo $path ?>" placeholder="" maxlength="128" required="true" readonly>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputMood" class="col-xs-2 control-label">心 情</label>
			<div class="col-xs-8" style="margin-top:5px">
				<input type="text" class="hide" name="song-mood" id="inputMood" value="<?php echo $moods ?>">
				<?php foreach ($this->config->item('moods') as $key => $mood): ?>
					<?php if( $key == $moods ): ?>
					<span class="label label-info cursor" data-value="<?php echo $key ?>"><?php echo $mood ?></span>
					<?php else: ?>
					<span class="label label-default cursor" data-value="<?php echo $key ?>"><?php echo $mood ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputLanguage" class="col-xs-2 control-label">语 言</label>
			<div class="col-xs-8" style="margin-top:5px">
				<input type="text" class="hide" name="song-language" id="inputLanguage" value="<?php echo $language ?>">
				<?php foreach ($this->config->item('languages') as $key => $lang): ?>
					<?php if( $key == $language ): ?>
					<span class="label label-info cursor" data-value="<?php echo $key ?>"><?php echo $lang ?></span>
					<?php else: ?>
					<span class="label label-default cursor" data-value="<?php echo $key ?>"><?php echo $lang ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
				<span class="help-block"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="inputStyle" class="col-xs-2 control-label">风 格</label>
			<div class="col-xs-8" style="margin-top:5px">
				<input type="text" class="hide" name="song-style" id="inputStyle" value="<?php echo $style ?>">
				<?php foreach ($this->config->item('styles') as $key => $sty): ?>
					<?php if( $key == $style ): ?>
					<span class="label label-info cursor" data-value="<?php echo $key ?>"><?php echo $sty ?></span>
					<?php else: ?>
					<span class="label label-default cursor" data-value="<?php echo $key ?>"><?php echo $sty ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
				<span class="help-block"></span>
			</div>
		</div>


		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
				<button type="submit" class="btn btn-default">保 存</button>
			</div>
		</div>

	</form>
</div>






