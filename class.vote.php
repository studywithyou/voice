<?php
//Vote class
/*
 * @param int $vote
 * @param string $user_id
 * @param int $vote_id;
 * @param string $img_url
 */
class Vote {
  private static $instance;
  public $vote;
  public $user_id;
  public $vote_id;
  public $img_url;

  

  private function __construct($vote, $user_id, $img_url){
    $this->vote = $vote;
    $this->user_id = $user_id;
    $this->img_url = $img_url;
    $vote_info = array();
    array_push($vote_info, $this->vote);
    return $vote_info;
  }
  public function set_vote($vote, $user_id, $img_url) {
    $this->vote = $vote;
    $this->user_id = $user_id;
    $this->img_url = $img_url;
    $vote_info = array();
    array_push($vote_info, $this->vote);
    return $vote_info;
}

  public function get_vote($img_url){
    $this->img_url = $img_url;
    $this->result = $result; //output of database query fed $img_url as arg
    return $this->result;
  }

  public function test(){
    echo "Oh?";

  }

}