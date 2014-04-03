<?php
include_once './class.db.php';

class Vote {
  public $vote_value;
  public $user_id;
  public $img_url;

  public function __construct($vote_value, $user_id, $img_url) {
    $this->vote_value = $vote_value;
    $this->user_id = $user_id;
    $this->img_url = $img_url;

  }

  //TODO could set it up so that the constructor gets the vote value from db first
  public function getVoteValue(){
    return $this->vote_value;
  }
}