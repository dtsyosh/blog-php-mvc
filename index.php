<?php

require 'config.php';
require __DIR__ . '/vendor/autoload.php';

function autoloader($class_name) {
    include(LIBS . '/' . $class_name . '.php');
}

spl_autoload_register('autoloader');

$bootstrap = new Bootstrap();

$bootstrap->init();