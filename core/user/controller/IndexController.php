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

         /**
         debug($this);
         $this->init();

          ============================

         $num = '1'; // 1: int, 1.5: float, '1': string
         $num = $this->clearNum($num);
          *
         */

         $post = $this->isPost();
         exit();
    }

}