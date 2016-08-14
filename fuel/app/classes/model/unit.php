<?php

class Model_Unit extends \Orm\Model
{

	protected static $_properties = array(
           'id',
           'name',
           'exp',
           'lvl',
           'base_id',
           'ext_id',
	);

	protected static $_table_name = 'unit';

	public static function validate($factory)
	{
	       $val = Validation::forge($factory);
           $val->add_field('name','Name','required|max_length[50]');
           $val->add_field('exp','Exp','required|valid_string[numeric]');
           $val->add_field('lvl','Lvl','required|valid_string[numeric]');
           $val->add_field('base_id','Base Id','required|valid_string[numeric]');
           $val->add_field('ext_id','Ext Id','valid_string[numeric]');

	       return $val;
	}

    protected static $_belongs_to = array (
         'base_model' =>  array (
               'key_from' => 'base_id',
               'model_to' => 'Model_Base_model',
               'key_to' => 'id',
         ),
         'ext_model' =>  array (
               'key_from' => 'ext_id',
               'model_to' => 'Model_Ext_model',
               'key_to' => 'id',
         ),
       );
       
}
