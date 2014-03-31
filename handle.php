<?php
date_default_timezone_set('America/New_York');
include("class.db.php");

 function go(){
  $new = new Db;
  $new->set_vote(0, "33", "min01.jpg");

 return $new;
}

go();
