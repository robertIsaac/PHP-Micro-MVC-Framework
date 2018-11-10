<?php
include "../app/conf.php";

date_default_timezone_set(TIMEZONE);
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', COOKIE_SECURE);

//session
session_name(SESSION_NAME);
session_set_cookie_params(SESSION_LIFE_TIME);
session_start();


define('JS', ROOT . 'js-' . VERSION . '/');
define('CSS', ROOT . 'css-' . VERSION . '/');

//connect to the database

try {
    $dbh = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST . ';charset=UTF8', DATABASE_USERNAME, DATABASE_PASSWORD);
} catch (PDOException $e) {
    echo 'Connection to database failed';
    return false;
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


require_once '../app/init.php';
$app = new \Core\App();
