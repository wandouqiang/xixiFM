<div class="container">

	<table class="table table-striped table-hover" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>编号</th>
				<th>名称</th>
				<th>邮箱</th>
				<th>手机</th>
				<th>昵称</th>
				<th>分组</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
			<tr>
				<td># <?php echo $user['user_id'] ?></td>
				<td><?php echo $user['user_login'] ?></td>
				<td><?php echo $user['user_email'] ?></td>
				<td><?php echo $user['user_iphone'] ?></td>
				<td><?php echo $user['user_nicename'] ?></td>
				<td><?php echo $this->config->item('groups')[$user['user_group']] ?></td>
				<td>
					<a href="<?php echo 'admin.php?c=users&m=remove&id=' . $user['user_id'] ?>" style="margin-left: 15px;"><i class="fa fa-2x fa-times"></i></a>
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

