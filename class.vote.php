<?php
include_once './class.db.php';

class Vote {
  public $vote_value;
  public $user_id;
  public $img_url;

  public function __construct($vote_value, $user_id, $img_url) {
    if ($_POST['yes']){
      $this->vote_value = 1;
    }

    else if ($_POST['no']) {
      $this->vote_value = 0;
    }

    $this->user_id = $user_id;
    $this->img_url = $img_url;

    return $this;
  }

  public function setVote(){
    $vote = $this->vote_value;
    $user_id = $this->user_id;
    $img_url = $this->img_url;
    $db = new Db();
    $command = "INSERT INTO data (vote, user_id, img_url) VALUES (" . $vote . ", '" . $user_id . "', '" . $img_url ."');";
    $db->query($command);
  }
  //TODO could set it up so that the constructor gets the vote value from db first
  public function getVoteValue(){
    return $this->vote_value;
  }
}