    	<?php foreach ($musics as $music): ?>
    		
    		<div class="col-xs-6 col-sm-4 col-md-3 top-15">
    			<div class="user-back">
    				<a href="index.php?c=music&m=vols&id=<?php echo $music['music_id'] ?>">
    					<img src="<?php echo $music['music_image'] ?>" class="img-responsive">
    				</a>
    				<a href="index.php?c=music&m=vols&id=<?php echo $music['music_id'] ?>">
    					<p class="text-center top-15"><?php echo $music['music_name'] ?></p>
    				</a>
    				<p class="text-center hide"><i class="fa fa-trash"></i></p>
    			</div>
    		</div>

    	<?php endforeach; ?>

    	<div class="text-right">
		<?php
		    echo $this->pagination->create_links();
		?>
		</div>
  	</div>
</div>