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

        require_once 'models/user_model.php';

        $user = new User_Model();

        $userDB = $this->database->select("SELECT * FROM users WHERE email = :email", array(
            ':email' => $_POST['email'],
        ))[0];

        if (crypt($_POST['password'], CRYPT_STD_DES) == $userDB['password']) {
            // login
            $user->id = $userDB['id'];
            $user->name = $userDB['name'];
            $user->email = $userDB['email'];
            $user->role_id = $userDB['role_id'];
            
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user', $user);

            header('location: '. URL .'post');
        } else {
            header('location: '. URL .'login');
        }
   
    }
}
        
