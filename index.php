<?php

require 'config.php';
require __DIR__ . '/vendor/autoload.php';

function libsAutoloader($class_name) {
    include(LIBS . '/' . $class_name . '.php');
}

spl_autoload_register('libsAutoloader');

$bootstrap = new Bootstrap();

$bootstrap->init();