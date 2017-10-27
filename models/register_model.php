<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function create($data) {
        $this->database->insert('users', array(
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> crypt($_POST['password'], CRYPT_STD_DES),
            'active' => true
        ));
        
        header('location: '. URL .'login');
    }
        
}
