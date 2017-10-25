<?php

class View {
    function __construct() {

    }

    /**
     * Renderize a view
     *
     * @param string $name
     * @param boolean $noInclude
     * @return void
     */
    public function render($name, $noInclude = false) {

        if (!$noInclude) {

            include 'views/inc/header.php';
            require 'views/' . $name . '.php';
            include 'views/inc/sidebar.php';
            include 'views/inc/footer.php';

        } else {

            require 'views/' . $name . '.php';
        }
    }

}