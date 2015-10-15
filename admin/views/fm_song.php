<div class="container">
	<div class="col-xs-12 text-center" style="margin-bottom: 10px;">
		<a href="admin.php?c=add" class="btn btn-default" role="button">添 加</a>
	</div>
	<form class="form-horizontal" action="admin.php?c=upload&m=upload_song" method="post" id="upload_form" enctype="multipart/form-data" role="form">
        <div class="form-group text-center">
      		<div class="fileUpload btn btn-info">
			    <span>上 传</span>
			    <input id="upload_botton" name="userfile" type="file" class="upload" />
			</div>
			<input type="submit" class="hide"/>
        </div>
	</form>
	<table class="table table-striped table-hover" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>编号</th>
				<th>名称</th>
				<th>歌手</th>
				<th>来源</th>
				<th>风格</th>
				<th>语言</th>
				<th>心情</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($songs as $key => $song): ?>
			<tr>
				<td># <?php echo $song['song_id'] ?></td>
				<td><?php echo $song['song_name'] ?></td>
				<td>
					<?php echo str_replace(',', ' ', $song['song_authors']); ?>
				</td>
				<td><?php echo $this->config->item('song_source')[$song['song_source']] ?></td>
				<td><?php echo $this->config->item('styles')[$song['song_style']] ?></td>
				<td><?php echo $this->config->item('languages')[$song['song_language']] ?></td>
				<td><?php echo $this->config->item('moods')[$song['song_moods']] ?></td>
				<td><a href="<?php echo 'admin.php?c=song&m=updateSong&song=' . $song['song_id'] ?>"><i class="fa fa-2x fa-pencil-square-o"></i></a>
					<a href="<?php echo 'admin.php?c=song&m=delete&song=' . $song['song_id'] ?>" style="margin-left: 15px;"><i class="fa fa-2x fa-times"></i></a>
				</td>
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

