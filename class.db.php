<?php

class Db {
  private $host;
  private $user;
  private $pw;
  private $database;

  public function __construct(){
    $this->host = "localhost";
    $this->user = "ptwickler";
    $this->pw = "123456";
    $this->database = "object";

    ;
  }


  public function set_vote($vote, $user_id, $img_url) {
    $connect = new mysqli($this->host, $this->user, $this->pw, $this->database or die("Cannot connect to database"));
    $command = "INSERT INTO votes values (vote, user_id, img_url) VALUES (" . $vote . ", '" . $user_id . "', '" . $img_url ."')";
    $connect->query($command);

    return $connect;

  }

  public function ping() {
    set_vote(0, "1", "main01.jpg");
    echo "check it out";
  }

}