<?php

class Post extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        require_once 'models/user_model.php';

        
        $this->view->title = 'Posts';
        $posts = $this->model->selectAll();
        
        // Adding user object in field 'user' in all posts
        for ($i = 0; $i < count($posts); $i++) {
            
            $user = new User_Model();
            $userDB = $this->model->user($posts[$i]['user_id']);
            $user->name = $userDB['name'];
            $user->email = $userDB['email'];
            $user->id = $userDB['id'];
            
            $posts[$i]['user'] = $user;
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
        require_once 'models/user_model.php';
        require_once 'models/comment_model.php';

        $user = new User_Model();
        $comment = new Comment_Model();

        $this->view->post = $this->model->find($id);
        
        $userDB = $this->model->user($this->view->post['user_id']);
        $user->name = $userDB['name'];
        $user->email = $userDB['email'];
        $user->id = $userDB['id'];
        
        
        $this->view->comments = $comment->select($id);
        $this->view->post['user'] = $user;
        //
        $this->view->title = $this->view->post['title'];
        $this->view->render('post/show');
        //header('Refresh:0; location: '. URL .'post/show');
    }

    public function update($data) {

        $postData = array(
            'title' => $_POST['title'],
            'body'  => $_POST['body']
        );
    
       
    }

    public function destroy($id) {
        # delete
    }
}