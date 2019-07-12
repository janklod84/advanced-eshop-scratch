<?php


/**
 * Подключеные необходимые файлы
 */
require_once 'config.php';
require_once  'core/base/settings/internal_settings.php';


use core\base\exceptions\RouteException;


try
{
    (new A());

}catch (RouteException $e){

    exit($e->getMessage());
}catch (\core\base\exceptions\Route2Exception $e){

}


//
//
exit('Код выполнен');


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

    public $db = false; // 1

    public  function __construct()
    {

        if($this->db) { throw new \core\base\exceptions\Route2Exception('Малеькая ошибочка'); }
        else throw new RouteException('Ошибка');
    }
}