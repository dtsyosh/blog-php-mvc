<?php

class View {
    function __construct() {

    }
    public function render($name, $noInclude = false) {
        require 'views/inc/header.php';
        require 'views/' . $name . '.php';
        require 'views/inc/footer.php';
    }
}