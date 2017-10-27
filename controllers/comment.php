<?php

class Comment extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this->view->title = 'Posts';
        $comments = $this->model->selectAll();
        
        // Adding user object in field 'user' in all posts
        for ($i = 0; $i < count($comments); $i++) {
            $comments[$i]['user'] = $this->model->user($comments[$i]['user_id']);
        }

        $this->view->posts = $comments;

        $this->view->render('post/show');
    }

    public function create() {
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->title = 'Criar novo Comentário';
            $this->view->render('post/show');
        } else {

            $data = array(
                'body'  => $_POST['body']
            );
            
            $this -> model -> create($data);
    
            header('location: ' . URL . 'post');
        }
    }

    public function show($id) {
        
        $this->view->post = $this->model->find($id);
        $this->view->post['user'] = $this->model->user($this->view->post['user_id']);
        $this->view->title = $this->view->post['body'];
        $this->view->render('post/show');
        //header('Refresh:0; location: '. URL .'post/show');
    }

    public function update($data) {

        
    
       
    }

    public function destroy($id) {
        # delete
    }
}