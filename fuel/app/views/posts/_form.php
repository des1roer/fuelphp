<?php echo Form::open(array("class" => "form-horizontal")); ?>
<fieldset>
    <div class="form-group"><?= Form::label('Post Title', 'post_title', array('class' => 'control-label')); ?>
        <?= Form::input('post_title', Input::post('post_title', isset($posts) ? $posts->post_title : ''), array('required' => 'required', 'class' => 'col-md-4 form-control', 'placeholder' => 'Post Title')); ?></div>
    <div class="form-group"><?= Form::label('Post Content', 'post_content', array('class' => 'control-label')); ?>
        <?= Form::textarea('post_content', Input::post('post_content', isset($posts) ? $posts->post_content : ''), array('required' => 'required', 'class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder' => 'Post Content')); ?></div>
    <div class="form-group"><?= Form::label('Author Name', 'author_name', array('class' => 'control-label')); ?>
        <?= Form::input('author_name', Input::post('author_name', isset($posts) ? $posts->author_name : ''), array('required' => 'required', 'class' => 'col-md-4 form-control', 'placeholder' => 'Author Name')); ?></div>
    <div class="form-group"><?= Form::label('Author Email', 'author_email', array('class' => 'control-label')); ?>
        <?= Form::input('author_email', Input::post('author_email', isset($posts) ? $posts->author_email : ''), 
                array('required' => 'required', 'class' => 'col-md-4 form-control', 'placeholder' => 'Author Email')); ?></div>
    <div class="form-group"><?= Form::label('Author Website', 'author_website', array('class' => 'control-label')); ?>
        <?= Form::input('author_website', Input::post('author_website', isset($posts) ? $posts->author_website : ''),
                array('', 'class' => 'col-md-4 form-control', 'placeholder' => 'Author Website')); ?></div>
    <div class="form-group"><?= Form::label('Post Status', 'post_status', array('class' => 'control-label')); ?>
        <?= Form::input('post_status', Input::post('post_status', isset($posts) ? $posts->post_status : ''),
                array('', 'type' => 'number', 'class' => 'col-md-4 form-control', 'placeholder' => 'Post Status')); ?></div>

    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?= Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
</fieldset>
<?php if (isset($csrf)): ?>
    <?= Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token()); ?>
<?php endif; ?>
<?= Form::close(); ?>