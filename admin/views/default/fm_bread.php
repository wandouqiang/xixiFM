<div class="container">
    <ol class="breadcrumb">
    	<?php foreach ($bread as $key => $value): ?>
    		<?php if ( empty($value) ): ?>
				<li class="active"><?php echo $key ?></li>
			<?php else: ?>
				<li><a href="<?php echo base_url($value) ?>"><?php echo $key ?></a></li>
			<?php endif; ?>
    	<?php endforeach; ?>
    </ol>
</div>