<?php

namespace Model;

use PDO;

class User extends \Core\Model {
  function login($userName, $password) {
    $sth = $this->dbh->prepare('SELECT * FROM user WHERE name = ?');
    if (!$sth->execute([$userName])) {
      return false;
    }
    if (!$result = $sth->fetchObject()) {
      return false;
    }
    if (!password_verify($password, $result->password)) {
      return false;
    }
    session_regenerate_id();
    $_SESSION['userId'] = $result->id;
    $_SESSION['userName'] = $result->name;
    return true;
  }

  function getUser($userId) {
    $sth = $this->dbh->prepare('SELECT * FROM user WHERE id = ?');
    if (!$sth->execute([$userId])) {
      return false;
    }
    if (!$result = $sth->fetchObject()) {
      return false;
    }
    return $result;
  }

  function getUsers() {
    $sth = $this->dbh->prepare('SELECT * FROM user');
    if (!$sth->execute()) {
      return false;
    }
    $result = $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  function hashPassword($password) {
    $options = [
      'cost' => PASSWORD_COST,
      ];
    return password_hash($password, PASSWORD_ALGO, $options);
  }
}
