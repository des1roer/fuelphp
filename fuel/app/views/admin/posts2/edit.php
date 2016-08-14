<h2>Editing Posts2</h2>
<br>

<?php echo render('admin/posts2/_form'); ?>
<p>
	<?php echo Html::anchor('admin/posts2/view/'.$posts2->id, 'View'); ?> |
	<?php echo Html::anchor('admin/posts2', 'Back'); ?></p>
