<?php echo Form::open(array("class" => "form-horizontal")); ?>

<fieldset>
    <div class="form-group">
        <?php echo Form::label('Title', 'title', array('class' => 'control-label')); ?>

        <?php echo Form::input('title', Input::post('title', isset($posts2) ? $posts2->title : ''), array('class' => 'col-md-4 form-control', 'placeholder' => 'Title')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Slug', 'slug', array('class' => 'control-label')); ?>

        <?php echo Form::input('slug', Input::post('slug', isset($posts2) ? $posts2->slug : ''), array('class' => 'col-md-4 form-control', 'placeholder' => 'Slug')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Summary', 'summary', array('class' => 'control-label')); ?>

        <?php echo Form::textarea('summary', Input::post('summary', isset($posts2) ? $posts2->summary : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder' => 'Summary')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Body', 'body', array('class' => 'control-label')); ?>

        <?php echo Form::textarea('body', Input::post('body', isset($posts2) ? $posts2->body : ''), 
                array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder' => 'Body')); ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

        <?php echo Form::select('user_id', Input::post('user_id', isset($posts2) ? $posts2->user_id : $current_user->id), 
                $users, array('class' => 'col-md-4 form-control', 'placeholder' => 'User id')); ?>

    </div>


    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
</fieldset>
<?php echo Form::close(); ?>