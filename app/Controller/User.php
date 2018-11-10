<?php

namespace Controller;

use Model;

class user extends \Core\Controller {
  function index() {
    header('location:' . ROOT . 'user/money');
  }

  function list(): void {
    $modelUser = new Model\User();
    $users = $modelUser->getUsers();
    self::view('user/list', compact('users'));
  }

  function single($userId = null): void {
    if ($userId === null || !is_numeric($userId)) {
      Errors::error400();
      return;
    }
    $modelUser = new Model\User();
    $user = $modelUser->getUser($userId);
    self::view('user/single', compact('user'));
  }
}
