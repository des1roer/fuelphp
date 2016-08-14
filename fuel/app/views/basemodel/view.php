<h2>Viewing <span class='muted'><?=$basemodel->id?></span></h2>
<br>	<p><strong>Name</strong>
	<?=$basemodel->name?><p>
	<p><strong>Img</strong>
	<?=$basemodel->img?><p>
<p>
	<?= Html::anchor('basemodel/view/'.$basemodel->id, 'View');?> |
	<?= Html::anchor('basemodel', 'Back');?>
</p>