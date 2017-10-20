<?php

class Post extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this -> view -> title = 'Posts';

        $this -> view -> render('post/index');
    }

    public function create() {
        
        $data = array(
            'title' => $_POST['title'],
            'body'  => $_POST['body']
        );

        $this -> model -> create($data);
        
        header('location: ' . URL);
    }

    public function update($id) {
        # update
    }

    public function destroy($id) {
        # delete
    }
}