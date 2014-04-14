<?php

include_once "./class.db.php";
include_once "./class.vote.php";
include_once "./class.view2.php";
date_default_timezone_set('America/New_York');
$user_id  = ltrim($_SERVER['REMOTE_ADDR'], "::");

if (isset($_POST['data'])) {
  $voteObj = json_decode($_POST['data']);
  $voteObj->user_id =$user_id;
  echo var_dump($voteObj);
}

else { echo "Error";}