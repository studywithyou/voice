<!DOCTYPE html>
<html lang="en">
<head>
    <title>Voice</title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="./voice.css">
  <?php  date_default_timezone_set('America/New_York');?>
<?php include_once("class.vote.php");?>



  <?php include_once("class.db.php"); ?>
</head>
<body>
  <div class = "wrapper">
      <div class = "redbar">
      </div>

      <div class = "container">
          <div class="caption">
              Don't You Love This Photo?
          </div>
          <button class = "redbox_left">
              <img src="./img/left_arrow2.gif" alt="previous image">
          </button>
          <img class= "main_img" src="./img/main_img.jpg" alt="kitten">
          <button class = "redbox_right">
              <img src="./img/right_arrow2.gif" alt="next image">
          </button>
          </div>
      <div class="controls">
          <div class="positive_percent">
              80%
          </div>
          <button class="thumbs_up">
              <img src="./img/thumbs_up.jpg" alt="vote yes">
          </button>

          <div class="negative_percent">
              20%
          </div>
          <button class="thumbs_down" onclick = "<?php ">
              <img class="thumb" src="./img/thumbs_down.jpg" alt="vote no">
          </button>
      </div>


  </div>

</body>
</html>