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
            'alias' => 'admin',
            'path' => 'core/admin/controller/',
            'hrUrl' => false, // Human realeable URL [ ЧПУ ]
             'routes' => []
         ],
         'settings' => [
             'path' => 'core/base/settings/'
         ],
         'plugins' => [
             'path'  => 'core/plugins/',
             'hrUrl' => false, // Human realeable URL [ ЧПУ ]
             'dir'   => false
         ],
         // В пользовским часть нужно всегда ЧПУ т.е поэтому включим его вставим TRUE
         'user' => [
             'path'   => 'core/user/controller/',
             'hrUrl'  => true, // Human realeable URL [ ЧПУ ]
             'routes' => []
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


     /* private $foo = 'foo'; */


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
     * @return array
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
                     $baseProperties[$name] = $this->arrayMergeRecursive($this->{$name}, $property);
                     continue;
              }

              if(!$property) $baseProperties[$name] = $this->{$name};
          }


          return $baseProperties;
     }


     /**
      * Array Merge recursive
      *
      * @return mixed
     */
     public function arrayMergeRecursive()
     {
          $arrays = func_get_args();

          $base = array_shift($arrays);

          foreach ($arrays as $array)
          {
              foreach ($array as $key => $value)
              {
                   if(is_array($value) && is_array($base[$key]))
                   {
                        $base[$key] = $this->arrayMergeRecursive($base[$key], $value);

                   }else{

                        // если номерован массив
                        if(is_int($key))
                        {
                             if(!in_array($value, $base)) array_push($base, $value);
                             continue;
                        }

                        $base[$key] = $value;
                   }
              }
          }

          return $base;
     }


}