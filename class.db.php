<?php
require_once './class.vote.php';
require_once './class.view2.php';
require_once './control2.php';

class Db {
  public $host;
  public $user;
  public $pw;
  public $database;
  public $connect;

  public function __construct(){
    $this->host = 'localhost';
    $this->user = 'ptwickler';
    $this->pw = '123456';
    $this->database = 'object';
    $this->connect = new mysqli($this->host, $this->user, '123456', 'object');

    return $this->connect;


  }


  public function set_vote($vote, $user_id, $img_url) {
    $connect = $this->connect;


    $command = "INSERT INTO data (vote, user_id, img_url) VALUES (". $vote . ", '" . $user_id . "', '" . $img_url ."');";

    $connect->query($command);



  }

}