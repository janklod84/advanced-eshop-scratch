<?php
namespace core\base\controllers;


/**
 * Class RouteController
 *
 * Это мост весь нашего проекта
 * Он будет отвечать за все
 * Он должен иметь разбераться на такой адрес
 * http://shop.loc/catalog/phone/page/2
 *
 * @package core\base\controllers
 */
class RouteController
{

    /**
     * @var RouteController $_instance
     */
     static private $_instance;


    /**
     * RouteController constructor.
     *
     * @return void
     */
     private function __construct()
     {


     }

     /**
      * Запришаю создание копию объект
      *
      * prevent to clone object
     */
     private function __clone()
     {


     }



    /**
      * Get instance
      *
      *
      * @return self
     */
     static public function getInstance()
     {
         if(self::$_instance instanceof self)
         {
             return self::$_instance;
         }

         return self::$_instance = new self;
     }
}