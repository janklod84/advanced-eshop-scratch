<?php
namespace core\base\settings;


use core\base\settings\Settings;


/**
 * Class ShopSettings
 *
 * @package core\base\settings
 */
class ShopSettings
{

    /**
     * @var $_instance
     * @var $baseSettings
     */
    static private $_instance;
    private $baseSettings;


    /**
     * @var array $templateArr ['name', 'phone', 'adress', 'price', 'short'],
     * @var array $textarea    ['content', 'keywords', 'goods_content']
     */
    private $templateArr = [
        'text'     => ['price', 'short'],
        'textarea' => ['goods_content']
    ];



    /**
     * @return
     */
    static public function get($property)
    {
        return self::instance()->{$property};
    }


    /**
     * @return self
     */
    static public function instance()
    {
        if(self::$_instance instanceof self)
        {
            return self::$_instance;
        }

        self::$_instance = new self;

        // storage base settings
        self::$_instance->baseSettings = Settings::instance();
        $baseProperties = self::$_instance->baseSettings->clueProperties(get_class());

        return self::$_instance;
    }


    /**
     * Settings constructor.
     *
     * @return void
     */
    private function __construct() {}



    /**
     * prevent to copy/clone classe
     */
    private function __clone(){}



}