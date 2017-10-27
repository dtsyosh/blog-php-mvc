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

    public function hasRole($roles) {
        $data = array();
        foreach ($roles as $role) {
            array_push($data, $this->database->select('SELECT * from roles as r
                inner join users as u on u.role_id = r.id
                and u.id = '. $this->id .' and r.name like = '. $role);

        }
        return empty($data);
    }

}