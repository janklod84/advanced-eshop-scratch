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
     *
     * @throws \ReflectionException
     */
    protected function inputData()
    {
        $template = $this->render(false, ['name' => 'Иван']);
        exit($template);
    }
}