<?php

class Bootstrap {

    private $_url = null;
    private $_controller = null;

    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    public function init() {

        $this->_getUrl();
        
        // Loads the default controller if no url is set
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        $this->_loadController();

    }
    
    public function _getUrl() {
        /*
        * Gets the url and passes to a variable.
        * The 'rtrim()' function is to exclude the '/' from
        * the url
        */
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    
    public function _loadDefaultController()
    {
        /*
        * Loads the default controller (Index),
        * then loads the index page of the site (_controller->index())
        */
        

        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    public function _loadController() {

        // Tries to load the controller that fits to the current url
        $file = $this->_controllerPath . $this->_url[0] . '.php';

        // If the controller exists
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }
    }

    public function _callControllerMethods() {

        // Calculates how much params are in the url
        $length = count($this->_url);

        // Verify if method exists in controller
        if ($length > 1) {

            if (!method_exists($this->_controller, $this->_url[1])) {

                $this->_error();
            }
        }

        // Determine what to load
        switch ($length) {
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;

            case 4:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;

            case 3:
                //Controller->Method(Param1)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;

            case 2:
                //Controller->Method()
                $this->_controller->{$this->_url[1]}();
                break;

            default:
                $this->_controller->index();
                break;
        }

    }

    public function _error() {

        require $this->_controllerPath . $this->_errorFile;

        $this->_controller = new MyError();
        $this->_controller->index();

        exit;
    }
}