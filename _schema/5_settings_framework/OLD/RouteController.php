<?php
namespace core\base\controllers;


use core\base\settings\Settings;
use core\base\settings\ShopSettings;




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
     * Запришение создания копию объекта
     *
     * prevent to clone object
     */
    private function __clone() {}




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


    /**
     * RouteController constructor.
     *
     * @return void
     */
    private function __construct()
    {
        $settings  = Settings::get('routes'); // debug($setting)
        $shopSettings = ShopSettings::get('property');

        exit();
    }

}