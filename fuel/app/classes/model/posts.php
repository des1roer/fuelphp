<?php

class Model_Posts extends \Orm\Model {

    protected static $_belongs_to = array('user');
    protected static $_has_many = array('comments');
    
    protected static $_properties = array(
        'id',
        'post_title',
        'post_content',
        'author_name',
        'author_email',
        'author_website',
        'post_status',
    );
    protected static $_table_name = 'posts';

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('post_title', 'Post Title', 'required|max_length[100]');
        $val->add_field('post_content', 'Post Content', 'required');
        $val->add_field('author_name', 'Author Name', 'required|max_length[65]');
        $val->add_field('author_email', 'Author Email', 'required|max_length[80]');
        $val->add_field('author_website', 'Author Website', 'max_length[60]');
        $val->add_field('post_status', 'Post Status', 'valid_string[numeric]');

        return $val;
    }

}
