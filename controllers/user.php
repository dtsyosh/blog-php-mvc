<?php

class User extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->title = 'User';
        $this->view->render('user/index');
    }

    public function create(){
        if($SERVER['REQUEST_METHOD'] === 'GET'){
            $this->view->title = 'Registrar';
            $this->view->render('user/create');
        }else{
            
            $data = array();
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['password'] = password_hash($_POST['password']);
    
            $this->model->create($data); // check if this model exists
            header('location: ' . URL . 'user');
        }
    }

    public function update($id) {
        # update
    }

    public function destroy($id) {
        # delete
    }


}