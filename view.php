<?php

date_default_timezone_set('America/New_York');
require_once "./class.db.php";
require_once "./class.vote.php";
$current_img = "main01.jpg";
$user_id = ltrim($_SERVER['REMOTE_ADDR'], "::");

echo <<< EOL

<!doctype html>
<html lang="en">
  <head>
    <title>
      PHP-Based Page
    </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./object.css">
  </head>
  <body>
   <div class="display">
        <div class="display" id="image">
          <img class="main_img"  src="./gallery/
EOL;
echo $current_img . "\">";

echo <<< EOL




        </div><!-- end .display#image-->
        <div class="display" id="container">
          <form method="POST" action="
EOL;

$vote_yes = new Handle($current_img, $user_id);
//$vote_yes->vote_yes();
echo <<< EOL
            "><button name = "yes" type="submit" >H</button>
          </form>
      </div><!--end .display#container-->
      </div><!-- end.display

  </body>
</html>

EOL;


?>