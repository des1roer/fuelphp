<?php
class Controller_Basemodel extends Controller_Template
{

	public function action_index()
	{
		
			/*  
			*  Example Basemodel Model Code
			*
			* $basemodel = Model_Basemodel::find('all');
			*
			* foreach($basemodel as $datas){
			*   echo $datas->id; //example basemodel table column name id
			*
			*   foreach($datas->unit as $data){
			*	   echo $data->extmodel->id; //example extmodel table column name id
			*      
			*   }
			* }
			*/
			
		
		$data['basemodel'] = Model_Basemodel::find('all');
		$this->template->title = "Categories";
		$this->template->content = View::forge('basemodel/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('basemodel');

		if ( ! $data['basemodel'] = Model_Basemodel::find($id))
		{
			Session::set_flash('error', 'Could not find basemodel #'.$id);
			Response::redirect('basemodel');
		}

		$this->template->title = "Basemodel";
		$this->template->content = View::forge('basemodel/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Basemodel::validate('create');

			if ($val->run())
			{
				$basemodel = Model_Basemodel::forge(array(
					'name' => Input::post('name'),
					'img' => Input::post('img'),
				));

				if ($basemodel and $basemodel->save())
				{
					Session::set_flash('success', 'Added basemodel #'.$basemodel->id.'.');

					Response::redirect('basemodel');
				}

				else
				{
					Session::set_flash('error', 'Could not save basemodel.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Basemodel";
		$this->template->content = View::forge('basemodel/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('basemodel');

		if ( ! $basemodel = Model_Basemodel::find($id))
		{
			Session::set_flash('error', 'Could not find basemodel #'.$id);
			Response::redirect('basemodel');
		}

		$val = Model_Basemodel::validate('edit');

		if ($val->run())
		{
				$basemodel->name = Input::post('name');
				$basemodel->img = Input::post('img');

            if ($basemodel->save())
			{
				Session::set_flash('success', 'Updated basemodel #' . $id);

				Response::redirect('basemodel');
			}

			else
			{
				Session::set_flash('error', 'Could not update basemodel #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				
				$basemodel->name = $val->validated('name');
				$basemodel->img = $val->validated('img');


				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('basemodel', $basemodel, false);
		}

		$this->template->title = "Basemodel";
		$this->template->content = View::forge('basemodel/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('basemodel');

		if ($basemodel = Model_Basemodel::find($id))
		{
			$basemodel->delete();

			Session::set_flash('success', 'Deleted basemodel #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete basemodel #'.$id);
		}

		Response::redirect('basemodel');

	}

}
