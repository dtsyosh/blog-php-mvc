<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function create($data) {
        $this->database->insert('users', array(
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> $_POST['password'],
            'active' => true
        ));
        
        header('location: '. URL .'login');
    }
        
}
