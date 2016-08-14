<h2>Viewing <span class='muted'><?=$posts->id?></span></h2>
<br>	<p><strong>Post Title</strong>
	<?=$posts->post_title?><p>
	<p><strong>Post Content</strong>
	<?=$posts->post_content?><p>
	<p><strong>Author Name</strong>
	<?=$posts->author_name?><p>
	<p><strong>Author Email</strong>
	<?=$posts->author_email?><p>
	<p><strong>Author Website</strong>
	<?=$posts->author_website?><p>
	<p><strong>Post Status</strong>
	<?=$posts->post_status?><p>
<p>
	<?= Html::anchor('posts/view/'.$posts->id, 'View');?> |
	<?= Html::anchor('posts', 'Back');?>
</p>