<?php

require 'config.php';

function autoloader($class_name) {
    include(LIBS . '/' . $class_name . '.php');
}

spl_autoload_register('autoloader');

$bootstrap = new Bootstrap();

$bootstrap->init();