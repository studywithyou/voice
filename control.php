<?php
include_once "./class.db.php";
include_once "./class.vote.php";
include_once "./class.view2.php";
date_default_timezone_set('America/New_York');
$user_id  = ltrim($_SERVER['REMOTE_ADDR'], "::");


class Control {
  public $img_url;
  public $user_id;


  public function vote_yes($db_conn){
    $command = "INSERT INTO data (vote, user_id, img_url) VALUES (" . $this->vote_value . ", '" . $this->user_id . "', " . $this->img_url . "');";
    $db_conn->query($command);

  }

public function __construct() {
  if(isset($_POST['data'])){
    $voteObj = json_decode($_POST['data']);
    echo $voteObj->img_url;
  }

  else {
    $voteObj = "Gg";
    echo $voteObj;
  }


  $this->vote_value = $this->voteObj[0];
  $this->user_id == ltrim($_SERVER['REMOTE_ADDR'], "::");
  $this->img_url =  $this->voteObj[1];
  $db_conn = new Db;
  $db_conn->set_vote($this->vote_value, $this->user_id, $this->img_url);



}


}