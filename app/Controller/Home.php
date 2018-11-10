<?php

namespace Controller;

use Model;

class Home extends \Core\Controller {
  function index() {
    $this->view('home/index');
  }

  function login(): void {
    $user = new Model\User;

    if (isset($_SESSION['userId'])) {
      $this->showAlert('you are logged', ROOT . 'home/sign');
      return;
    }

    if (!isset($_POST['userName'], $_POST['password'])) {
      Errors::error400();
      return;
    }

    $loginStatus = $user->login($_POST['userName'], $_POST['password']);
    if ($loginStatus) {
      self::showAlert('you have logged in');
      return;
    } else {
      $this->showAlert('username or password is wrong', ROOT . 'home/sign');
      return;
    }
  }

  function sign(): void {
    $this->view('home/sign');
  }

  function logout() {
    if (isset($_SESSION['userId'])) {
      $_SESSION = array();

      if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
      }
      session_destroy();

      self::showAlert('you have logged out successfully');
    } else {
      $this->showPage('you are not logged');
    }
  }
}
