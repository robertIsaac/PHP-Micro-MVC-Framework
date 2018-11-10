<?php

define('VERSION', 'v1.0.0');
define('SESSION_NAME', 'mvc');

if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
{
    $protocol='https://';
    $port = $_SERVER['SERVER_PORT'] == 443 ? '' : ':' . $_SERVER['SERVER_PORT'];
}
else
{
    $protocol='http://';
    $port = $_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT'];
}
define('ROOT', $protocol . rtrim($_SERVER['SERVER_NAME'] . $port . $_SERVER['SCRIPT_NAME'], 'index.php'));
define('COOKIE_SECURE', 0);
define('TIMEZONE', 'Africa/Cairo');

define('DATABASE_HOST', 'localhost');
define('DATABASE_USERNAME', 'DATABASE_USERNAME');
define('DATABASE_PASSWORD', 'DATABASE_PASSWORD');
define('DATABASE_NAME', 'DATABASE_NAME');
define('SITE_NAME', 'PHP Micro MVC Framework');
define('SESSION_LIFE_TIME', 28 * 24 * 60 * 60); // four weeks
define('PASSWORD_ALGO', PASSWORD_DEFAULT);
define('PASSWORD_COST', 15);
