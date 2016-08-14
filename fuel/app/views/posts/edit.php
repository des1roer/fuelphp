<h2>Edit <span class='muted'>Posts</span></h2>
<br>
<?= render('posts/_form')?>
<p>
	<?= Html::anchor('posts/view/'.$posts->id , 'View');?> |
	<?= Html::anchor('posts', 'Back');?>
</p>