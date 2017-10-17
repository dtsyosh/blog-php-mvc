<?php

class Bootstrap {

    private $_url = null;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_viewPath = 'views/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    public function init() {

        $this->_getUrl();
        
        // Loads the default controller if no url is set
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        
        // Loads the controller that fits to the current url
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
}