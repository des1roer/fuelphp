<h2>Listing <span class='muted'>Base model</span></h2>
<br>
<?php if ($basemodel): ?>

<table class="table table-striped">
	<thead>
		<tr>			<th>Name</th>
			<th>Img</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($basemodel as $item): ?>
		<tr>			<td><?= $item->name ?></td>
			<td><?= $item->img ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?= Html::anchor('basemodel/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-info btn-sm')); ?>
						<?= Html::anchor('basemodel/edit/'.$item->id, '<i class="glyphicon glyphicon-pencil"></i> Edit', array('class' => 'btn btn-warning btn-sm')); ?>
						<?= Html::anchor('basemodel/delete/'.$item->id, '<i class="glyphicon glyphicon-trash"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No basemodel </p>

<?php endif; ?>
<p>
	<?= Html::anchor('basemodel/create', 'Add new Base model', array('class' => 'btn btn-success')); ?>

</p>