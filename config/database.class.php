<?php
abstract class database
{
  protected $dbc;
  function __construct()
  {
    include 'config.php';
    $this->dbc = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME",$DB_USER,$DB_PASS);
  }
}
?>
