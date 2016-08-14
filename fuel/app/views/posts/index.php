<h2>Listing <span class='muted'>Posts</span></h2>
<br>
<?php if ($posts): ?>

<table class="table table-striped">
	<thead>
		<tr>			<th>Post Title</th>
			<th>Post Content</th>
			<th>Author Name</th>
			<th>Author Email</th>
			<th>Author Website</th>
			<th>Post Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>
		<tr>			<td><?= $item->post_title ?></td>
			<td><?= $item->post_content ?></td>
			<td><?= $item->author_name ?></td>
			<td><?= $item->author_email ?></td>
			<td><?= $item->author_website ?></td>
			<td><?= $item->post_status ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?= Html::anchor('posts/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-info btn-sm')); ?>
						<?= Html::anchor('posts/edit/'.$item->id, '<i class="glyphicon glyphicon-pencil"></i> Edit', array('class' => 'btn btn-warning btn-sm')); ?>
						<?= Html::anchor('posts/delete/'.$item->id, '<i class="glyphicon glyphicon-trash"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No posts </p>

<?php endif; ?>
<p>
	<?= Html::anchor('posts/create', 'Add new Posts', array('class' => 'btn btn-success')); ?>

</p>