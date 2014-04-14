<?php
//TODO I have started adding in the AJAX. It now sends to the script, but I need to alter the control.php to then respond to it
date_default_timezone_set('America/New_York');
require_once "./class.db.php";
require_once "./class.view2.php";
$current_img = "main01.jpg";
$user_id = ltrim($_SERVER['REMOTE_ADDR'], "::");

$out = new View2("main01.jpg");

$out->display("main01.jpg");
?>