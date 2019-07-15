<?php
namespace core\base\settings;


use core\base\controller\Singleton;
use core\base\settings\Settings;



/**
 * Class ShopSettings
 *
 * @package core\base\settings
 */
class ShopSettings
{

    use Singleton;

    /**
     * @var $baseSettings
     */
    private $baseSettings;



    /**
     * @var array $routes
     * dir => controller
     * можно писать так controller/, /controller, или false если нам не нужно dir
     */

    private $routes = [
        'plugins' => [
            'dir'   => false,
            'routes' => []
        ]
    ];

    /**
     * @var array $templateArr ['name', 'phone', 'adress', 'price', 'short'],
     * @var array $textarea    ['content', 'keywords', 'goods_content']
     */
    private $templateArr = [
        'text'     => ['price', 'short', 'name'],
        'textarea' => ['goods_content']
    ];



    /**
     * @return
     */
    static public function get($property)
    {
        return self::getInstance()->{$property};
    }


    /**
     * @return self
     */
    static private function getInstance()
    {
        if(self::$_instance instanceof self)
        {
            return self::$_instance;
        }

        // storage base settings
        self::instance()->baseSettings = Settings::instance();
        $baseProperties = self::instance()->baseSettings->clueProperties(get_class());
        self::instance()->setProperty($baseProperties);

        return self::$_instance;
    }


    /**
     * Set all properties
     *
     * @param $properties
     */
    protected function setProperty($properties)
    {
        if($properties)
        {
            foreach ($properties as $name => $property)
            {
                $this->{$name} = $property;
            }
        }
    }


}