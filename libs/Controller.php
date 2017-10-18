<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }

    public function _loadModel($name, $modelPath = 'models/') {

        $path = $modelPath . $name . '_model.php';

        if (file_exists($path)) {

            require $modelPath . $name . '_model.php';

            $classModel = $name . '_Model';
            $this->model = new $classModel();
        }
    }
}