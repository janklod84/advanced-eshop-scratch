<?php


/**
 * Подключеные необходимые файлы
 */
require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';


use core\base\exceptions\RouteException;


try
{
    (new A());

}catch (RouteException $e){

    exit($e->getMessage());

}


class A
{
    public  function __construct()
    {
        (new B());
    }
}



class B
{
    public  function __construct()
    {
        (new C());
    }
}



class C
{
    public  function __construct()
    {
        throw new RouteException('Ошибка');
    }
}