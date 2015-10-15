<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<a href="admin.php?c=music&m=add" class="btn btn-default" role="button">创 建</a>
		</div>
		<?php foreach ($channels as $channel): ?>
		<div class="col-xs-6 col-sm-4 col-md-3 top-15">
			<div class="user-back">
				<a href="index.php?c=music&m=vols&id=<?php echo $channel['music_id'] ?>" target="_black">
					<img src="<?php echo $channel['music_image'] ?>" class="img-responsive">
				</a>
				<a href="index.php?c=music&m=vols&id=<?php echo $channel['music_id'] ?>" target="_black">
					<p class="text-center top-15"><?php echo $channel['music_name'] ?></p>
				</a>
				<p class="text-center top-15">
					<a href="admin.php?c=music&m=remove&id=<?php echo $channel['music_id'] ?>"><i class="fa fa-times"></i></a>
				</p>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="text-right">
	<?php
	    echo $this->pagination->create_links();
	?>
	</div>
</div>