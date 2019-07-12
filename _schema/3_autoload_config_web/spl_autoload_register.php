<?php

/**
 * Autoloading classes
 */


function load1($class_name)
{
    include "n1/" . $class_name . '.php';
}


function load2($class_name)
{
    include "n2/" . $class_name . '.php';
}


spl_autoload_register('load1');
# true сгенирование исключение при невозможно подключение к классу
# поставить текушая функция в конец или в начале
spl_autoload_register('load2', true);

(new A());