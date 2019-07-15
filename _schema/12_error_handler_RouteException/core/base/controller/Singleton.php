<?php
namespace core\base\controller;


trait Singleton
{


    /**
     * @var object $_instance
     */
    static private $_instance;


    /**
     * Запришение создания копию объекта
     *
     * prevent to copy/clone object
     */
    private function __clone() {}


    /**
     * Settings constructor.
     *
     * @return void
     */
    private function __construct() {}



    /**
     * Get instance
     *
     * @return self
     * @throws Exception
     */
    static public function instance()
    {
        if(self::$_instance instanceof self)
        {
            return self::$_instance;
        }

        return self::$_instance = new self;
    }


}