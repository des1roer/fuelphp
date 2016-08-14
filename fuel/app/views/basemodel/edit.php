<h2>Edit <span class='muted'>Base model</span></h2>
<br>
<?= render('basemodel/_form')?>
<p>
	<?= Html::anchor('basemodel/view/'.$basemodel->id , 'View');?> |
	<?= Html::anchor('basemodel', 'Back');?>
</p>