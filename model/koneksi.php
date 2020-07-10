<?php
class Koneksi
{

  private $host     = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'simkeuangan';

  protected $conn;

  function __construct()
  {
    if (!isset($this->conn))
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

    if (!$this->conn)
      echo 'Koneksi Gagal';
    else
      return $this->conn;
  }
}
