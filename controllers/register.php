<?php

class Register extends Controller {

    function __construct() {

        parent::__construct();
    }

    public function index() {

        $this->view->title = 'Register';
        $this->view->render('register/index');
    }

    public function create() {
        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        );

        $this->model->create($data);

        header('location: '. URL .'post');
    }
}