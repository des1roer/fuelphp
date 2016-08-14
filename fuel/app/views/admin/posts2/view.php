<h2>Viewing #<?php echo $posts2->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $posts2->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $posts2->slug; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $posts2->summary; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $posts2->body; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $posts2->user_id; ?></p>

<?php echo Html::anchor('admin/posts2/edit/'.$posts2->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/posts2', 'Back'); ?>