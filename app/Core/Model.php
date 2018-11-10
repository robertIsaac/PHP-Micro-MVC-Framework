<?php

namespace Core;

abstract class Model {
  protected $date;
  protected $time;
  protected $dbh;

  function __construct() {
    global $dbh;
    $this->dbh = $dbh;
    $this->date = date('Y-m-d', time());
    $this->time = date('Y-m-d G:i:s', time());
  }
}