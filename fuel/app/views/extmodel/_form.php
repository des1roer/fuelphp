<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<fieldset>
		<div class="form-group"><?= Form::label('Name', 'name', array('class'=>'control-label')); ?>
		<?= Form::input('name', Input::post('name', isset($ext_model) ? $ext_model->name : ''), array('required' => 'required', 'class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?></div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?= Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php if (isset($csrf)): ?>
	<?= Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token()); ?>
<?php endif; ?>
<?= Form::close();?>