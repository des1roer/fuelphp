<?php

class Model_Basemodel extends \Orm\Model
{

	protected static $_properties = array(
           'id',
           'name',
           'img',
	);

	protected static $_table_name = 'base_model';

	public static function validate($factory)
	{
	       $val = Validation::forge($factory);
           $val->add_field('name','Name','required|max_length[50]');
           $val->add_field('img','Img','max_length[50]');

	       return $val;
	}

    protected static $_has_many = array (
         'unit' =>  array (
               'key_from' => 'id',
               'model_to' => 'Model_Unit',
               'key_to' => 'base_id',
         ),
       );
       
}
