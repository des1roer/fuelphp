<?php

class Model_Posts2 extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'title',
        'slug',
        'summary',
        'body',
        'user_id',
        'created_at',
        'updated_at',
    );
    protected static $_belongs_to = array('user');
    //protected static $_has_many = array('comments');
    
    protected static $_has_many = array(
        'comments' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Comment',
            'key_to' => 'post_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'conditions' => array(
                'order_by' => array(
                    'id' => 'DESC'
                )
            ),
        ),
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('title', 'Title', 'required|max_length[255]');
        $val->add_field('slug', 'Slug', 'required|max_length[255]');
        $val->add_field('summary', 'Summary', 'required');
        $val->add_field('body', 'Body', 'required');
        $val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

        return $val;
    }

}
