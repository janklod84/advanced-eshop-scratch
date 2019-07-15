<?php
namespace core\base\controller;


use core\base\exceptions\RouteException;
use core\base\settings\Settings;


/**
 * Class BaseController
 *
 * @package core\base\controller
 */
abstract class BaseController
{


    // Trait
    use \core\base\controller\BaseMethods;



    /**
     * @var string $page
     * @var array  $errors
     */
    protected $page;
    protected $errors;


    /**
     * @var string $controller   [ controller name ]
     * @var string $inputMethod  [ action name ]
     * @var string $outputMethod [ for view ]
     * @var array  $parameters   [ params from url ]
     */
    protected $controller;
    protected $inputMethod;
    protected $outputMethod;
    protected $parameters;


    /**
     * @throws \ReflectionException
     * @throws RouteException
     */
    public function route()
    {
        // получаем имя контроллер
        $controller = str_replace('/', '\\', $this->controller);


        try
        {
            // Reflection Method
            $object = new \ReflectionMethod($controller, 'request');

            // массив аргументов
            $args = [
                'parameters'   => $this->parameters,
                'inputMethod'  => $this->inputMethod,
                'outputMethod' => $this->outputMethod
            ];


            // call method request
            // [ Мы создаем объект класса и передаем его метод invoke
            $object->invoke(new $controller, $args);


        }catch(\ReflectionException $e){

            throw new RouteException($e->getMessage());
        }

    }


    /**
     * @param array $args
     */
    public  function request($args)
    {
        $this->parameters = $args['parameters'];

        $inputData  = $args['inputMethod'];
        $outputData = $args['outputMethod'];

        $data = $this->{$inputData}();

        if(method_exists($this, $outputData))
        {
            $page = $this->{$outputData}($data);
            if($page) {
                $this->page = $page;
            }

        }elseif ($data){

            $this->page = $data;
        }

        // если в ошибке что то есть
        if($this->errors)
        {
            $this->writeLog();
        }

        // Get Page [ Пулучаем страничку
        $this->getPage();
    }


    /**
     * @param string $path
     * @param array $parameters
     * @return false|string
     * @throws \ReflectionException
     * @throws RouteException
     */
    protected function render($path = '', $parameters = [])
    {
         extract($parameters);

         if(!$path)
         {
             // класс Reflexion
             $class = new \ReflectionClass($this);

             // получаем постранство имен
             $space  = str_replace('\\', '/', $class->getNamespaceName() . '\\');
             $routes = Settings::get('routes');


             if($space === $routes['user']['path'])
             {
                 $template = TEMPLATE;

             }else{

                 $template = ADMIN_TEMPLATE;
             }

             // полный путь к шаблону
             $path = $template . explode('controller', strtolower($class->getShortName()))[0];
         }

         // Открываем буфер обмена
         ob_start();

         if(!@include_once $path . '.php')
         {
             throw new RouteException('Отсутствует шаблон - ' . $path);
         }

         // получаем из буфер то что там хранился
         return ob_get_clean();

    }


    // Завершаем выполнения скрипта и при этом показываем страницу
    protected function getPage() // terminate
    {
        /* exit($this->page); */

        /**
         * если массив
         */
        if(is_array($this->page))
        {
            foreach($this->page as $block)
            {
                echo $block;
            }

        }else{ // не массив, например строк ..

            echo $this->page;
        }

        // завершим работа скрипта
        exit();
    }



}