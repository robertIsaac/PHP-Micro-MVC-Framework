<?php

namespace Core;

abstract class Controller {

  protected $date;
  protected $time;

  function __construct() {
    $this->date = date('Y-m-d', time());
    $this->time = date('Y-m-d G:i:s', time());
  }

  static function showPage($data): void {
    self::view('showPage', ['data' => $data]);
  }

  static function view($view, $data = []): void {
    extract($data);
    $fileDirectory = ROOT_PATH . "view/" . $view . ".php";
    if (!file_exists($fileDirectory)) {
      \Controller\Errors::error500();
      throw new \Exception($view . ' view not found');
    }
    require_once $fileDirectory;
  }

  static function header(): void {
    if (!isset($_SESSION['userId'])) {
      self::view('header/notLoggedHeader');
      return;
    }

    self::view('header/loggedHeader');
    return;
  }

  static function head(): void {
    self::view('head');
  }

  static function footer(): void {
    self::view('footer');
  }

  function showAlert($data, $url = ROOT, $time = 5): void {
    $this->view('showAlert', ['data' => $data, 'url' => $url, 'time' => $time]);
  }
}