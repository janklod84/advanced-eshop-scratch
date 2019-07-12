<?php

/**
 * Констант безопасности
 * Это длч того чтобы закрыт доступ к показу файл config.php например
 */
define('VG_ACCESS', true);


/**
 * Мы говорим браузер пользователя какую кодировку мы ему будем отправлять данные
 * и никакие выводи перед отправки
 */
header('Content-Type:text/html;charset=utf-8');


/**
 * Stating session
 */
session_start();


/**
 * Подключеные необходимые файлы
 */
require_once 'config.php';
require_once  'core/base/settings/internal_settings.php';



/**
 * Autoloading classes
 */


function load1($class_name)
{
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    include $class_name . '.php';
}


spl_autoload_register('load1');

(new \n1\A());
(new \n2\A());