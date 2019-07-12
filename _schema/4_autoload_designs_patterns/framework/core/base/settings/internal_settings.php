<?php


/**
 * Закрыто доступ
 * if defined VG_ACCESS Execute , otherwise close access
 */
defined('VG_ACCESS') or die('Access denied');

/**
 * Более фундаментальных настроек для нашего приложения
 * например путь к шаблону,
 * настроеки безапасность сайта
 * или путь к картинки ..
 */


/**
 * Шаблон пользователский часть нашего сайта
 * Путь к административный панель нашего сайта
 * Констант безопасности
 */
const TEMPLATE = 'templates/default/';
const ADMIN_TEMPLATE = 'core/admin/views/';


/**
 * Констант безопасности любой констант можно писать на место 1.0.0
 * Ключ шифрования
 * Констант отвечает за бесдействие куки
 * Констант отвечает за блокировки пользователь попытавший подобрать пароль к нашему сайту
 */
const COOKIE_VERSION = '1.0.0';
const CRYPT_KEY = '';
const COOKIE_TIME = 60;
const BLOCK_TIME  = 3;


/**
 * Констант для постраничных навигации Perpage [ для управления количество товаров на странице ]
 * Количество ссылок для постранички навигации
 */
const QTY = 8; // 8 товаров по умолчанию будем показать
const QTY_LINKS = 3; // 3 ссылок активные


/**
 * ХХраниться путей к CSS и Javascript Файлы Административный часть
 */
const ADMIN_CSS_JS = [
    'styles'  => [],
    'scripts' => []
];


/**
 * Храниться путей к CSS и Javascript Файлы Пользователский часть
 */
const USER_CSS_JS = [
    'styles'  => [],
    'scripts' => []
];


use core\base\exceptions\RouteException;

/**
 * Autoloading classes
 */

function autoloadMainClasses($class_name)
{
    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once($class_name . '.php'))
    {
         throw new RouteException('Не верное имя файла для подключения - '. $class_name);
    }
}


spl_autoload_register('autoloadMainClasses');

