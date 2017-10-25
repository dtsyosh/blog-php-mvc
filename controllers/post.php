<?php

class Post extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this->view->title = 'Posts';
        $posts = $this->model->selectAll();
        
        // Adding user object in field 'user' in all posts
        for ($i = 0; $i < count($posts); $i++) {
            $posts[$i]['user'] = $this->model->user($posts[$i]['user_id']);
        }

        $this->view->posts = $posts;

        $this->view->render('post/index');
    }

    public function create() {
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->title = 'Criar nova publicação';
            $this->view->render('post/create');
        } else {

            $data = array(
                'title' => $_POST['title'],
                'body'  => $_POST['body']
            );
            
            $this -> model -> create($data);
    
            header('location: ' . URL . 'post');
        }
    }

    public function show($id) {
        
        $this->view->post = $this->model->find($id);
        $this->view->post['user'] = $this->model->user($this->view->post['user_id']);
        $this->view->title = $this->view->post['title'];
        $this->view->render('post/show');
        //header('Refresh:0; location: '. URL .'post/show');
    }

    public function update($id) {
        # update
    }

    public function destroy($id) {
        # delete
    }
}