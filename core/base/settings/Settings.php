<?php
namespace core\base\settings;


/**
 * Class Settings
 *
 * @package core\base\settings
 */
class Settings
{

    /**
     * @var $_instance
     */
    static private $_instance;


    /**
     * @var array $route
     */
     private $route = [
         'admin' => [
            'name' => 'admin',
            'path' => 'core/admin/controllers/',
            'hrUrl' => false, // Human realeable URL [ ЧПУ ]
         ],
         'settings' => [
             'path' => 'core/base/settings/'
         ],
         'plugins' => [
             'path'  => 'core/plugins/',
             'hrUrl' => false, // Human realeable URL [ ЧПУ ]
         ],
         'user' => [
             'path'   => 'core/user/controllers/',
             'hrUrl'  => false, // Human realeable URL [ ЧПУ ]
             'routes' => [

             ]
         ],
         'default' => [
             'controller'   => 'IndexController',
             'inputMethod'  => 'inputData',
             'outputMethod' => 'outputData'
         ]
     ];


     private function __construct()
     {
     }


     private function __clone(){}
}