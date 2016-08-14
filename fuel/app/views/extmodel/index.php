<h2>Listing <span class='muted'>Ext model</span></h2>
<br>
<?php if ($extmodel): ?>

<table class="table table-striped">
	<thead>
		<tr>			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($extmodel as $item): ?>
		<tr>			<td><?= $item->name ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?= Html::anchor('extmodel/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-info btn-sm')); ?>
						<?= Html::anchor('extmodel/edit/'.$item->id, '<i class="glyphicon glyphicon-pencil"></i> Edit', array('class' => 'btn btn-warning btn-sm')); ?>
						<?= Html::anchor('extmodel/delete/'.$item->id, '<i class="glyphicon glyphicon-trash"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No extmodel </p>

<?php endif; ?>
<p>
	<?= Html::anchor('extmodel/create', 'Add new Ext model', array('class' => 'btn btn-success')); ?>

</p>