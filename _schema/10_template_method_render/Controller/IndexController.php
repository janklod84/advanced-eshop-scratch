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
        // $this->name = 'Masha';
        $name = 'Masha';
        $surname = 'Ivanova';


        return compact('name', 'surname');
    }


    /**
     * Output Data
     *
     * @throws \ReflectionException
     * @throws \core\base\exceptions\RouteException
     */
    protected function outputData()
    {
        // exit($this->render());
        // exit($this->render('', ['name' => $this->name]));

        $vars = func_get_arg(0);
        exit($this->render('', $vars));

    }
}