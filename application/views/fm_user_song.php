		<div class="col-xs-12" style="margin-top: 20px;">
			<table class="table table-striped">
				<tbody>
					<?php foreach($songs as $song): ?>
					<tr>
						<td><a href="<?php echo 'index.php?c=song&m=music&song=' . $song['song_id']; ?>"><?php echo $song['song_name'] ?></a></td>
						<td><?php echo $song['song_authors'] ?></td>
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
  	</div>
</div>