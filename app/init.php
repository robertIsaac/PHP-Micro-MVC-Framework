<?php
define('ROOT_PATH', dirname(__FILE__) . '/');

spl_autoload_register(function ($className) {
  $className = str_replace('\\', '/', $className);
  $filePath = ROOT_PATH . $className . '.php';
  if (file_exists($filePath)) {
    require_once $filePath;
  }
});
