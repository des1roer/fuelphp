<?php
class Controller_Extmodel extends Controller_Template
{

	public function action_index()
	{
		
		
		$data['extmodel'] = Model_Extmodel::find('all');
		$this->template->title = "Categories";
		$this->template->content = View::forge('extmodel/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('extmodel');

		if ( ! $data['extmodel'] = Model_Extmodel::find($id))
		{
			Session::set_flash('error', 'Could not find extmodel #'.$id);
			Response::redirect('extmodel');
		}

		$this->template->title = "Extmodel";
		$this->template->content = View::forge('extmodel/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Extmodel::validate('create');

			if ($val->run())
			{
				$extmodel = Model_Extmodel::forge(array(
					'name' => Input::post('name'),
				));

				if ($extmodel and $extmodel->save())
				{
					Session::set_flash('success', 'Added extmodel #'.$extmodel->id.'.');

					Response::redirect('extmodel');
				}

				else
				{
					Session::set_flash('error', 'Could not save extmodel.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Extmodel";
		$this->template->content = View::forge('extmodel/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('extmodel');

		if ( ! $extmodel = Model_Extmodel::find($id))
		{
			Session::set_flash('error', 'Could not find extmodel #'.$id);
			Response::redirect('extmodel');
		}

		$val = Model_Extmodel::validate('edit');

		if ($val->run())
		{
				$extmodel->name = Input::post('name');

            if ($extmodel->save())
			{
				Session::set_flash('success', 'Updated extmodel #' . $id);

				Response::redirect('extmodel');
			}

			else
			{
				Session::set_flash('error', 'Could not update extmodel #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				
				$extmodel->name = $val->validated('name');


				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('extmodel', $extmodel, false);
		}

		$this->template->title = "Extmodel";
		$this->template->content = View::forge('extmodel/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('extmodel');

		if ($extmodel = Model_Extmodel::find($id))
		{
			$extmodel->delete();

			Session::set_flash('success', 'Deleted extmodel #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete extmodel #'.$id);
		}

		Response::redirect('extmodel');

	}

}
