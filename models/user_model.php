<?php

class User_Model extends Model {

    public function __construct() {
        parent ::__construct();
    }

  

    public function create ($data){
        $this->database->insert('users', array( //check arrays
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> $data['password'],
        ));
    }

    

}



