<h2>Listing Posts2s</h2>
<br>
<?php if ($posts2s): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Summary</th>
			<th>Body</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts2s as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->slug; ?></td>
			<td><?php echo $item->summary; ?></td>
			<td><?php echo $item->body; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/posts2/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/posts2/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/posts2/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts2s.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/posts2/create', 'Add new Posts2', array('class' => 'btn btn-success')); ?>

</p>
