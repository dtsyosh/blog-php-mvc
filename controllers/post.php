<?php

class Post extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        # pass
    }

    public function create() {
        # send to create view
        $this->view->title = 'Criar um novo post';
        $this->view->render('post/create');
    }

    public function store($request) {
        # store a new row in database
    }

    public function update($id) {
        # update
    }

    public function destroy($id) {
        # delete
    }
}