<?php

namespace Controller;

class Errors extends \Core\Controller {

  static function index() {
    http_response_code(404);
    self::view('errors/404');
  }

  static function error403() {
    http_response_code(403);
    self::view('errors/403');
  }

  static function error400($message = '') {
    http_response_code(400);
    self::view('errors/400', compact('message'));
  }

  static function error408() {
    http_response_code(408);
    self::view('errors/408');
  }

  static function error500() {
    http_response_code(500);
    self::view('errors/500');
  }

  static function jsLog() {
    if (!isset($_POST)) {
      return false;
    }
    if (isset($_SESSION['userName'])) {
      $user = $_SESSION['userName'];
    } else {
      return true;
      //            $user = 'not logged';
    }
    if (isset($_POST['type'])) {
      $name = $_POST['type'];
      unset($_POST['type']);
    } else {
      $name = '';
    }
    $errorStr = str_replace('\n', "\n", json_encode($_POST, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    if (strpos($errorStr, 'chat') !== false) {
      return false;
    }
    $str = "$name ERROR : " . date("Y-m-d H:i:s") . ' : ' . $user;
    if (!error_log("$str\n$errorStr\n", 3, ROOT_PATH . "{$name}-errors.log")) {
      echo "Couldn't log the error";
    }
    return true;
  }

}