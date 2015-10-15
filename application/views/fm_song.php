<div class="container">

	<div class="row">
		<div class="col-xs-6 col-md-3" style="margin-bottom: 20px;">
			<label for="" class="control-label">语言</label>
			<select class="form-control" data-source="language">
			  	<option value="0" <?php if($c_language == 0) { echo 'selected'; } ?>>全部</option>
			  	<?php foreach ($this->config->item('languages') as $key => $language): ?>
			  	<option value="<?php echo $key ?>" <?php if($c_language == $key) { echo 'selected'; } ?>><?php echo $language ?></option>
			  	<?php endforeach; ?>
			</select>
		</div>

		<div class="col-xs-6 col-md-3" style="margin-bottom: 20px;">
			<label for="" class="control-label">心情</label>
			<select class="form-control" data-source="moods">
			  	<option value="0" <?php if($c_mood == 0) { echo 'selected'; } ?>>全部</option>
			  	<?php foreach ($this->config->item('moods') as $key => $mood): ?>
			  	<option value="<?php echo $key ?>" <?php if($c_mood == $key) { echo 'selected'; } ?>><?php echo $mood ?></option>
			  	<?php endforeach; ?>
			</select>
		</div>

		<div class="col-xs-6 col-md-3" style="margin-bottom: 20px;">
			<label for="" class="control-label">风格</label>
			<select class="form-control" data-source="style">
			  	<option value="0" <?php if($c_style == 0) { echo 'selected'; } ?>>全部</option>
			  	<?php foreach ($this->config->item('styles') as $key => $style): ?>
			  	<option value="<?php echo $key ?>" <?php if($c_style == $key) { echo 'selected'; } ?>><?php echo $style ?></option>
			  	<?php endforeach; ?>
			</select>
		</div>

		<div class="col-xs-6 col-md-3" style="margin-bottom: 20px;">
			<label for="inputSeacher" class="control-label">关键词</label>
			<div class="row">
				<div class="col-xs-8">
					<input type="text" class="form-control" id="inputSeacher" value="<?php echo $c_seacher ?>">
				</div>
				<div class="col-xs-4 text-right">
					<button class="btn btn-info" id="seacher">搜索</button>
				</div>
			</div>
		</div>
	</div>



	<table class="table table-striped">
		<tbody>
			<?php foreach($songs as $song): ?>
			<tr>
				<td><a href="<?php echo 'index.php?c=song&m=music&song=' . $song['song_id']; ?>"><?php echo $song['song_name'] ?></a></td>
				<td><?php echo $song['song_authors'] ?></td>
				<td><?php echo $this->config->item('languages')[$song['song_language']] ?></td>
				<td><?php echo $this->config->item('moods')[$song['song_moods']] ?></td>
				<td><?php echo $this->config->item('styles')[$song['song_style']] ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="text-right">
	<?php
	    echo $this->pagination->create_links();
	?>
	</div>

</div>
