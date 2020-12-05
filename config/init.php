<?php

define("DEBUG", 0);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/onlinetasks/core');
define("LIBS", ROOT . '/vendor/onlinetasks/core/libs');
//define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'tasks');

// http://onlinetasks/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://onlinetasks/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://onlinetasks
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';