<h2>Edit <span class='muted'>Ext model</span></h2>
<br>
<?= render('extmodel/_form')?>
<p>
	<?= Html::anchor('extmodel/view/'.$extmodel->id , 'View');?> |
	<?= Html::anchor('extmodel', 'Back');?>
</p>