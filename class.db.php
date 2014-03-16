<?
class db_control {
  private $host = 'locahost';
  private $user = 'ptwickler';
  private $pw = '123456';
  private $database = 'voice';

  public $command;

  function __construct(){
    $db = new mysqli($host, $user, $pw, $database or die("Cannot connect to database"));
    return $db;

  }

  function set_vote(){

  }
}