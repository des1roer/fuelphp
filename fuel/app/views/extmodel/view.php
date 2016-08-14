<h2>Viewing <span class='muted'><?=$extmodel->id?></span></h2>
<br>	<p><strong>Name</strong>
	<?=$extmodel->name?><p>
<p>
	<?= Html::anchor('extmodel/view/'.$extmodel->id, 'View');?> |
	<?= Html::anchor('extmodel', 'Back');?>
</p>