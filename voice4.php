<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voice_02</title>
  <meta charset = "utf-8">
  <link rel="stylesheet" href="./voice.css">
  <?php  date_default_timezone_set('America/New_York');?>

  <script type = "text/javascript">
    function vote(vote){

      var user_id = "<?php echo ltrim($_SERVER['REMOTE_ADDR'], "::");?>";
      var vote_val = vote;

      var img_pattern = /\.\/gallery\/(.*?\.(?:jpg|jpeg|gif|png|bmp))$/i; //checks to make sure only files with "valid" extensions are accepted1dd
      var img_path = document.getElementById("image_display").getAttribute("src");
      var img_url = img_path.match(img_pattern);

      if (img_url) {
        var img_url_val  = img_url[1];
      }
      else {
        alert("That's not an accepted file format.");
      }

      var voteObj = {
        vote: vote_val,
        user_id: user_id,
        img_url: img_url_val
      };

      var vote_string = JSON.stringify(voteObj);

      var xmlhttp;
      try {
        xmlhttp = new XMLHttpRequest();
      }
      catch(e1) {
        try {
          xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e2) {
          try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          catch (e3 ) {}
        }
      }

      if (!xmlhttp) {
        alert("Cannot create an XMLHTTP Object");
        // return false;
      }

      xmlhttp.open('POST', 'vote.php', true);
      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlhttp.send("data=" + encodeURIComponent(vote_string));

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var vote_response = xmlhttp.responseText;
          if (!(vote_response)) {
            alert("no response");
          }

          var vote_no = JSON.parse(vote_response)[0];
          var vote_yes = JSON.parse(vote_response)[1];

          // This method of cleaning up the numbers can lead to gobbledy gook 1e+%22 type errors
          // if the database isn't seeded with enough data to produce a situation where
          // the function generating the percent would divide by zero.
          document.getElementById("d_vote").innerHTML = parseInt(vote_no).toPrecision(2) +"%";
          document.getElementById("u_vote").innerHTML = parseInt(vote_yes).toPrecision(2)+"%";
          document.getElementById("test").innerHTML = JSON.parse(vote_response)[2];
        }
      }



    }
  </script>



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
    <img id ="image_display" class= "main_img" src="./gallery/main_img.jpg" alt="kitten">
    <button class = "redbox_right">
      <img src="./img/right_arrow2.gif" alt="next image">
    </button>
  </div>
  <div class="controls">
    <div class="positive_percent">
      <span id="u_vote">80%</span>
    </div>
    <button class="thumbs_up" onclick="vote(1)">
      <img src="./img/thumbs_up.jpg" alt="vote yes">
    </button>

    <div class="negative_percent">
      <span id = "d_vote">20%</span>
    </div>
    <button class="thumbs_down" onclick = "vote(0)">
      <img class="thumb" src="./img/thumbs_down.jpg" alt="vote no">
    </button>
  </div>

  <div id="test">

  </div>





  </div>
</body>
</html>