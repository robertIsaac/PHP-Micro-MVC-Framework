<?php

namespace Core;

class App {
  protected $controller = 'Errors';
  protected $method = 'index';
  protected $params = array();

  function __construct() {
    $url = $this->parseUrl();
    //        if no url then set controller to Home
    if ($url[0] === '') {
      $this->controller = 'Home';
    } elseif (file_exists(ROOT_PATH . "Controller/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    $controller = '\\Controller\\' . $this->controller;
    $this->controller = new $controller;
    //        if method doesn't exist then throw 404 http error
    //        if method isn't callable (private for example) throw 403 http error
    if (isset($url[1])) {
      if (!method_exists($this->controller, $url[1])) {
        $controller = '\\Controller\\Errors';
        $this->controller = new $controller;
        $this->method = 'index';
      } elseif (!is_callable([$this->controller, $url[1]])) {
        $controller = '\\Controller\\Errors';
        $this->controller = new $controller;
        $this->method = 'error403';
      } else {
        $this->method = $url[1];
      }
      unset($url[1]);
    }

    //        if its post request but data is not complete throw a 408 http error
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_LENGTH'] != strlen(file_get_contents('php://input'))) {
      $controller = '\\Controller\\Errors';
      $this->controller = new $controller;
      $this->method = 'error408';
    }

    //        finally if everything is okay execute the required method
    $this->params = ($url) ? array_values($url) : array();
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  //    if url doesn't end in / redirect him to the url with /
  function parseUrl() {
    if (isset($_GET['url'])) {
      if (substr($_GET['url'], -1) != '/') {
        http_response_code(301);
        header('location:' . ROOT . $_GET['url'] . '/');
        exit();
      }
      return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
    return ['0' => ''];
  }
}