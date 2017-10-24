<?php

class Post extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this->view->title = 'Posts';
        $this->view->posts = $this->model->selectAll();
        $this->view->render('post/index');
    }

    public function create() {
        
        if(!isset($_POST['body'])) {
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