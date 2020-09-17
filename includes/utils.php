<?php

function autoloader($class) {
    include_once('includes/'.$class.'.php');
    include_once('includes/classes/'.$class.'.php');
    include_once('controllers/'.$class.'.php');
    include_once('models/'.$class.'.php');
    include_once('views/'.$class.'.php');
}

//spl_autoload_extensions('.php');
spl_autoload_register('autoloader');