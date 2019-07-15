<?php

/**
 * Закрыто доступ
 * if defined VG_ACCESS Execute , otherwise close access
 */
defined('VG_ACCESS') or die('Access denied');


/**
 * Базовая конфигурация для быстро развернутого сайта
 * с одного хостинга до другого
 */


// Path
const SITE_URL = 'http://shop.loc';
const PATH = '/'; // dir/admin/...

// Database
const HOST = 'localhost';
const USER = 'root';
const PASS = '';
const DB_NAME = 'shop';


