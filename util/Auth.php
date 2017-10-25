<?php

class Auth {

    public static function handleLogin() {

        @session_start();

        $logged = $_SESSION['loggedIn'];

        // Verifies if the user is not logged then destroys the current session
        if (!$logged) {
            session_destroy();
            header('location: ../login');

            exit;
        }
    }
}