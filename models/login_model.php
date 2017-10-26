<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function run(){
        /*$stmt = $this->database->prepare("SELECT id FROM users WHERE email = :email AND password = :password ");
        $stmt->execute(array(
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ));
        */
        $crypted_password = $this->database->select("SELECT password FROM users WHERE email = :email", array(
            ':email' => $_POST['email'],
        ))[0];

        if (crypt($_POST['password'], $crypted_password['password']) == $crypted_password['password']) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user', $data);
            header('location: '. URL .'post');
        } else {
            header('location: '. URL .'login');
        }
   
    }
}
        
