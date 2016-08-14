<?php

class Controller_Posts extends Controller_Template {

    public function action_index() {
        $data['posts'] = Model_Posts::find('all');
        $this->template->title = "Categories";
        $this->template->content = View::forge('posts/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('posts');

        if (!$data['posts'] = Model_Posts::find($id)) {
            Session::set_flash('error', 'Could not find posts #' . $id);
            Response::redirect('posts');
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('posts/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Posts::validate('create');

            if ($val->run()) {
                $posts = Model_Posts::forge(array(
                            'post_title' => Input::post('post_title'),
                            'post_content' => Input::post('post_content'),
                            'author_name' => Input::post('author_name'),
                            'author_email' => Input::post('author_email'),
                            'author_website' => Input::post('author_website'),
                            'post_status' => Input::post('post_status'),
                ));

                if ($posts and $posts->save()) {
                    Session::set_flash('success', 'Added posts #' . $posts->id . '.');

                    Response::redirect('posts');
                } else {
                    Session::set_flash('error', 'Could not save posts.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('posts/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('posts');

        if (!$posts = Model_Posts::find($id)) {
            Session::set_flash('error', 'Could not find posts #' . $id);
            Response::redirect('posts');
        }

        $val = Model_Posts::validate('edit');

        if ($val->run()) {
            $posts->post_title = Input::post('post_title');
            $posts->post_content = Input::post('post_content');
            $posts->author_name = Input::post('author_name');
            $posts->author_email = Input::post('author_email');
            $posts->author_website = Input::post('author_website');
            $posts->post_status = Input::post('post_status');

            if ($posts->save()) {
                Session::set_flash('success', 'Updated posts #' . $id);

                Response::redirect('posts');
            } else {
                Session::set_flash('error', 'Could not update posts #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $posts->post_title = $val->validated('post_title');
                $posts->post_content = $val->validated('post_content');
                $posts->author_name = $val->validated('author_name');
                $posts->author_email = $val->validated('author_email');
                $posts->author_website = $val->validated('author_website');
                $posts->post_status = $val->validated('post_status');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('posts', $posts, false);
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('posts/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('posts');

        if ($posts = Model_Posts::find($id)) {
            $posts->delete();

            Session::set_flash('success', 'Deleted posts #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete posts #' . $id);
        }

        Response::redirect('posts');
    }

}
