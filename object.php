<?php ?>

<!doctype html>
  <html lang="en">
    <head>
      <title>
        Object 0ne
      </title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="./object.css">
       <?php  date_default_timezone_set('America/New_York');?>
      <?php include("class.db.php"); ?>


    </head>
    <body>
      <div>
        Goo
        <form method="POST" action="./handle.php">
        <button onclick="vote()">H</button>
        </form>
      </div>
    </body>
  </html>