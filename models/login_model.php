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
        $user = $this->database->select("SELECT * FROM users WHERE email = :email", array(
            ':email' => $_POST['email'],
        ))[0];

        if (crypt($_POST['password'], $user['password']) == $user['password']) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user', $user);

            header('location: '. URL .'post');
        } else {
            header('location: '. URL .'login');
        }
   
    }
}
        
