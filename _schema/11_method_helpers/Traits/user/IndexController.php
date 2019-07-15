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
     * Cette notation est utilisee quand deux traits on une methode en commune
     * Dans notre cas trait1 et trait2 on la method who() en commun.
     */
    use trait1, trait2 {
        //  указываем пририоритет
        // [ method who du Trait 1 est prioritaire a celle du Trait 2.
        #  trait1::who insteadof trait2;

        // [ method who du Trait 2 est prioritaire a celle du Trait 1.
        #  trait2::who insteadof trait1;

        trait1::who insteadof trait2;

        // Использования обы методы вне классе
        trait2::who as whoSecond;
    }


    /**
     * http://shop.loc/
     *
     * @throws \ReflectionException
     * @throws \core\base\exceptions\RouteException
     */
    protected function inputData()
    {

        $this->who();
        exit();
        $name = 'Иван';

        $content = $this->render('', compact('name'));
        $header  = $this->render(TEMPLATE . 'header');
        $footer  = $this->render(TEMPLATE . 'footer');

        return compact('header', 'content', 'footer');
    }

}