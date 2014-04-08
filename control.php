<?php
include_once "./class.db.php";
include_once "./class.vote.php";
include_once "./class.view2.php";
date_default_timezone_set('America/New_York');
$user_id  = ltrim($_SERVER['REMOTE_ADDR'], "::");


class Control {
  public $img_url;
  public $user_id;


/* function go(){
  $new = new Db;
  $new->set_vote(0, "33", "min01.jpg");

 return $new;
}*/

public function __construct($img_url, $user_id) {
  $this->vote_value = 1;
  $this->user_id = $user_id;
  $this->img_url = $img_url;
  $db_conn = new Db;
  return $db_conn;

}

public function vote_yes($db_conn){
  $command = "INSERT INTO data (vote, user_id, img_url) VALUES (" . $this->vote_value . ", '" . $this->user_id . "', " . $this->img_url . "');";
  $db_conn->query($command);
}
}