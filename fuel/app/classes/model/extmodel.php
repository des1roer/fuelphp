<?php

class Model_Extmodel extends \Orm\Model
{

	protected static $_properties = array(
           'id',
           'name',
	);

	protected static $_table_name = 'ext_model';

	public static function validate($factory)
	{
	       $val = Validation::forge($factory);
           $val->add_field('name','Name','required|max_length[50]');

	       return $val;
	}

    protected static $_has_many = array (
         'unit' =>  array (
               'key_from' => 'id',
               'model_to' => 'Model_Unit',
               'key_to' => 'ext_id',
         ),
       );
       
}
