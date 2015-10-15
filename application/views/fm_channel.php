<div class="container">
	<div class="row">
		<?php foreach ($channels as $channel): ?>
		<div class="col-xs-6 col-sm-4 col-md-3 top-15">
			<div class="user-back">
				<a href="index.php?c=music&m=vols&id=<?php echo $channel['music_id'] ?>">
					<img src="<?php echo $channel['music_image'] ?>" class="img-responsive">
				</a>
				<a href="index.php?c=music&m=vols&id=<?php echo $channel['music_id'] ?>">
					<p class="text-center top-15"><?php echo $channel['music_name'] ?></p>
				</a>
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