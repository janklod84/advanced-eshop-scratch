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


use core\base\exceptions\RouteException;
use core\base\controllers\RouteController;



try
{
    // RouteController::getInstance()->route();

}catch (RouteException $e){

    exit($e->getMessage());
}