<?php


function debug($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '<pre>';

}


function print_arr($arr)
{
    debug($arr);
    die;
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}