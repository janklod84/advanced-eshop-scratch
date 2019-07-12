<?php
namespace core\base\controller;


use core\base\exceptions\RouteException;
use core\base\settings\Settings;
use core\base\settings\ShopSettings;
use \Exception;


/**
 * Class RouteController
 *
 * Это мост весь нашего проекта
 * Он будет отвечать за все
 * Он должен иметь разбераться на такой адрес
 * http://shop.loc/catalog/phone/page/2
 *
 * @package core\base\controller
 */
class RouteController
{

    /**
     * @var RouteController $_instance
     */
     static private $_instance;

    /**
     * @var array $routes        [ all routes ]
     * @var string $controller   [ controller name ]
     * @var string $inputMethod  [ action name ]
     * @var string $outputMethod [ for view ]
     * @var array  $parameters   [ params from url ]
     */
     protected $routes;
     protected $controller;
     protected $inputMethod;
     protected $outputMethod;
     protected $parameters;





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
     * URL: http://shop.loc/catalog/phone
     * URI: /catalog/phone
     *
     * USER URL : http://shop.loc/catalog/phone
     * ADMIN URL: http://shop.loc/admin/shop/catalog/phone
     * [ admin: directory of admin, shop: name of plugin..]
     * @return void
     * @throws Exception
     *
     */
     private function __construct()
     {

          $adress_str = $_SERVER['REQUEST_URI']; // debug($adress_str);

         /**
          * если симболь '/' стоит в конце строки
          * и это не корень сайта
          *
          * мы должны перенаправить пользователь на страницу без этого симбола
          */
         if(strrpos($adress_str, '/') === (strlen($adress_str) -1) && strrpos($adress_str, '/') !== 0)
         {
             // мы должны перенаправить пользователь на страницу без этого симбола
             $this->redirect(rtrim($adress_str, '/'), 301); // 301 response code
         }

         // в переменная $path сохраним обрезаны строку в которой содержан имя выпольнения скрипта
         $path = substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], 'index.php'));


         // если $path совпадает с нашем определен констант PATH то будем запускать преложение
         // в противным случае будет бросать ползователь
         if($path === PATH)
         {

             $this->routes = Settings::get('routes');

             if(!$this->routes)
             {
                 throw new RouteException('Сайт находится на техническом обслуживании');
             }


             /**
              * USER URL : http://shop.loc/catalog/phone
              * ADMIN URL: http://shop.loc/admin/shop/catalog/phone [ admin: directory of admin, shop: name of plugin..]
              */

             /**
              * если у нас позиция alias равна строк
              * если это административный панель значит нам надо разбевать
              * строк относительно админ панель
              */
             if(strrpos($adress_str, $this->routes['admin']['alias']) === strlen(PATH))
             {

                 // ADMIN

             }else{

                 // USER
                  $url = explode('/', substr($adress_str, strlen(PATH)));

                  $hrUrl = $this->routes['user']['hrUrl']; // апределяет исползовать ЧПУ или нет

                  $this->controller = $this->routes['user']['path'];

                  $route = 'user';
             }

             // Создатель маршруты
             $this->createRoute($route, $url);


             exit();

         }else{

             try
             {
                 throw new Exception('Не корректная дирректория сайта');

             }catch (\Exception $e){

                 exit($e->getMessage());
             }
         }

     }


    /**
     * Create Route
     *
     * @param $var [ admin, plugins, user ...]
     * @param $arr
     */
    private function createRoute($var, $arr)
    {
        $route = [];


        // контроллер
        if(!empty($arr[0]))
        {
            if($alias = $this->routes[$var]['routes'][$arr[0]])
            {
                 $route = explode('/', $alias);

                 $this->controller .= ucfirst($route[0]). 'Controller';

            }else{

                $this->controller .= ucfirst($route[0]). 'Controller';
            }

        }else{

             $this->controller .= $this->routes['default']['controller'];
        }

        // получить методы
        $this->inputMethod  = $route[1] ? $route[1] : $this->routes['default']['inputMethod'];
        $this->outputMethod = $route[2] ? $route[2] : $this->routes['default']['outputMethod'];

        return;
    }

}