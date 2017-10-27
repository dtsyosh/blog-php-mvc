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

    public function can($permission) {

        die('funcionou');
        $data = $this->database->select('SELECT * FROM permissions as p
            inner join
            permission_role as pr on pr.permission_id = p.id
            inner join
            roles as r on r.id = pr.role_id
            and
            p.name like :permission', $permission);

        return empty($data);
    }

}