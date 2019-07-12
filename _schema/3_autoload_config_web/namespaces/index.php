<?php 

/**
 * Autoloading classes
 */


function load($class_name)
{
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    include $class_name . '.php';
}


spl_autoload_register('load');

(new \n1\A());
(new \n2\A());