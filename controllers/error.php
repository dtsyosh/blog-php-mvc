<?php

class MyError extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->title = '404 Error';
        $this->view->message = "This page doesn't exist";
        $this->view->render('error/inc/header', true);
        $this->view->render('error/index', true);
        $this->view->render('error/inc/footer', true);
    }
}