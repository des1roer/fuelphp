<?php

class Controller_Admin_Posts2 extends Controller_Admin {

    public function action_comment($slug) {
        $post = Model_Post::find_by_slug($slug);

        // Lazy validation
        if (Input::post('name') AND Input::post('email') AND Input::post('message')) {
            // Create a new comment
            $post->comments[] = new Model_Comment(array(
                'name' => Input::post('name'),
                'website' => Input::post('website'),
                'email' => Input::post('email'),
                'message' => Input::post('message'),
                'user_id' => $this->current_user->id,
            ));

            // Save the post and the comment will save too
            if ($post->save()) {
                $comment = end($post->comments);
                Session::set_flash('success', 'Added comment #' . $comment->id . '.');
            } else {
                Session::set_flash('error', 'Could not save comment.');
            }

            Response::redirect('blog/view/' . $slug);
        }

        // Did not have all the fields
        else {
            // Just show the view again until they get it right
            $this->action_view($slug);
        }
    }

    public function action_index() {
        $data['posts2s'] = Model_Posts2::find('all');
        $this->template->title = "Posts2s";
        $this->template->content = View::forge('admin/posts2/index', $data);
    }

    public function action_view($id = null) {
        $post = Model_Posts2::find_by_slug($id, array('related' => array('user')));

        var_dump($post);
        $data['posts2'] = Model_Posts2::find($id);
        //$this->template->title = $post->title;
        $this->template->title = "Posts2";
        $this->template->content = View::forge('admin/posts2/view', $data, array('post' => $post,));


        //$this->template->title = $post->title;
        // $this->template->content = View::forge('admin/posts2/view', array(
        //           'post' => $post,
        // ));
    }

    public function action_create() {
        $view = View::forge('admin/posts2/create');

        if (Input::method() == 'POST') {
            $val = Model_Posts2::validate('create');

            if ($val->run()) {
                $posts2 = Model_Posts2::forge(array(
                            'title' => Input::post('title'),
                            'slug' => Inflector::friendly_title(Input::post('title'), '-', true),
                            'summary' => Input::post('summary'),
                            'body' => Input::post('body'),
                            'user_id' => Input::post('user_id'),
                ));

                if ($posts2 and $posts2->save()) {
                    Session::set_flash('success', e('Added posts2 #' . $posts2->id . '.'));

                    Response::redirect('admin/posts2');
                } else {
                    Session::set_flash('error', e('Could not save posts2.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
        $this->template->title = "Posts2S";
        $this->template->content = View::forge('admin/posts2/create');
    }

    public function action_edit($id = null) {
        $view = View::forge('admin/posts2/create');
        $posts2 = Model_Posts2::find($id);
        $val = Model_Posts2::validate('edit');

        if ($val->run()) {
            $posts2->title = Input::post('title');
            $posts2->slug = Input::post('slug');
            $posts2->summary = Input::post('summary');
            $posts2->body = Input::post('body');
            $posts2->user_id = Input::post('user_id');

            if ($posts2->save()) {
                Session::set_flash('success', e('Updated posts2 #' . $id));

                Response::redirect('admin/posts2');
            } else {
                Session::set_flash('error', e('Could not update posts2 #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $posts2->title = $val->validated('title');
                $posts2->slug = $val->validated('slug');
                $posts2->summary = $val->validated('summary');
                $posts2->body = $val->validated('body');
                $posts2->user_id = $val->validated('user_id');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('posts2', $posts2, false);
        }
        $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
        $this->template->title = "Posts2s";
        $this->template->content = View::forge('admin/posts2/edit');
    }

    public function action_delete($id = null) {
        if ($posts2 = Model_Posts2::find($id)) {
            $posts2->delete();

            Session::set_flash('success', e('Deleted posts2 #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete posts2 #' . $id));
        }

        Response::redirect('admin/posts2');
    }

}
