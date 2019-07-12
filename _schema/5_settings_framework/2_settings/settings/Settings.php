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
     * @var array $routes
     */
     private $routes = [
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


     private $templateArr = [
         'text'     => ['name', 'phone', 'adress'],
         'textarea' => ['content', 'keywords']
     ];


     /**
      * Settings constructor.
      *
      * @return void
     */
     private function __construct()
     {
     }


     /**
      * prevent to copy/clone classe
     */
     private function __clone(){}


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
         return self::$_instance = new self;
     }


    /**
     * clue Properties [ клееть массив ]
     *
     * array_merge_recursive() умеет обработать многомерно массив
     *
     * @param $class [ Name of class settings must to set ]
     */
     public function clueProperties($class)
     {
          $baseProperties = [];

          foreach($this as $name => $item)
          {
              $property = $class::get($name);
              /* $baseProperties[$name] = $property; */

              if(is_array($property) && is_array($item))
              {
                   /* $baseProperties[$name] = array_merge_recursive($this->{$name}, $property); */
                  $baseProperties[$name] = array_replace_recursive($this->{$name}, $property);
              }
          }


          debug($baseProperties);
          exit();
     }
}