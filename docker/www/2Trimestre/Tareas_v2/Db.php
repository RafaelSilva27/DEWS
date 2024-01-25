<?php

  class Db {
    private $db;

    function __construct() {
      require_once 'config.php';
      $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if ($this->db->connect_errno) return -1;
      else return 0;
    }

    function close() {
      if ($this->db) $this->db->close();
    }
  }