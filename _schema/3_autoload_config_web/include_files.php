<?php


/**
 * Autoloading classes
 */

/*
$dir = get_include_path();
*/

/**
 * мы указываем PHP где нам искать файла
 * потому что PHP по умолчанию ищет всегда где ему искать файла
 */
set_include_path(
    get_include_path()
    . PATH_SEPARATOR . 'n1'
    . PATH_SEPARATOR . 'n2'

);

function __autoload($class_name)
{
    include $class_name .'.php';
}

(new A());