<?php
namespace core\user\controller;


use core\base\controller\BaseController;


/**
 * Class IndexController
 *
 * @package core\user\controller
 */
class IndexController extends BaseController
{

    /**
     * http://shop.loc/site/hello
     *
     * $routes = [
     *   'user' => [
     *      'routes' => [
     *         'site' => 'index/hello'
     *      ]
     *   ]
     * ];
     * @throws \ReflectionException
     */
    /*
     protected function hello()
     {
         $template = $this->render(false, ['name' => 'Иван']);

         exit($template);
     }
    */

    /**
     * @var string $name
     */
    protected $name;


    /**
     * http://shop.loc/
     *
     * @throws \ReflectionException
     * @throws \core\base\exceptions\RouteException
     */
    protected function inputData()
    {
         $name = 'Иван';
         $content = $this->render('', compact('name'));
         $header  = $this->render(TEMPLATE . 'header');
         $footer  = $this->render(TEMPLATE . 'footer');
         return compact('header', 'content', 'footer');
    }


    /**
     * Output Data
     *
     * @throws \ReflectionException
     * @throws \core\base\exceptions\RouteException
     */
    /*
    protected function outputData()
    {
         /*
          * exit($this->render());
          * exit($this->render('', ['name' => $this->name]));
          *
          * exit($this->render('', $vars));
          */

         /*
         1 - METHOD
         $vars = func_get_arg(0);
         return $vars;


         // 2 -METHOD
         $vars = func_get_arg(0);

         return $this->render(TEMPLATE.'templater', $vars);
    }
         */
}