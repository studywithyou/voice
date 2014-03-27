<?php
  date_default_timezone_set('America/New_York');

  $data = $_POST['data'];
  $voteObj = json_decode($data, true);



// TODO: Set up PHP to get the images in the dir and load them into an array so that the next img_url can be inserted into the JSON object and sent back to the JS where it will replace the current image.
  $dir_contents = scandir("./gallery/", 1);
  $current_index = array_search($voteObj['img_url'], $dir_contents);
 $current_img = $dir_contents[$current_index];
//$next_img = "main_img03.jpg";

// To get the next image to display, text the next index in the array containing the
// images and see if it is a valid index and if the file there is a real file or
// the directory "dots." If there is no next image, start over at 0.


// Popping the array twice gets rid of the "." and ".." items.
// TODO replace these pops with an array slice.
$dir_filt = array_slice($dir_contents, 0, -3);
//array_pop($dir_contents);

 if ($current_index +1 < count($dir_filt)) {


    $next_img = $dir_filt[$current_index +1];
  }

  else {
    $next_img = $dir_filt[0];
  }



//$next_img = var_dump($dir_contents);

  //Connects to the database and then runs the commands. First to check to make
  // sure that a user has not already voted on an image, then to insert a vote
  // if they have not already voted.
  $db = new mysqli("localhost", "ptwickler", "123456", "voice");
  $check_command = "SELECT user_id, img_url FROM votes WHERE user_id='".$voteObj['user_id'] ."' AND img_url='" . $voteObj['img_url'] ."';";
  $db_check = $db->query($check_command);

/*while ($data = $db_check->fetch_all($resulttype = MYSQLI_ASSOC)) {
  //echo $data[1][0]. " voted " . $data[1][1] . ", ";

  //echo "CHECK: " . print_r($data);

//$db_check->free();

}
*/


  $db->query("INSERT INTO votes ( vote, user_id, img_url) values(".$voteObj['vote'] .  ",'".$voteObj['user_id']."','" . $voteObj['img_url'] ."')");

  $command = "SELECT vote FROM votes WHERE img_url='" . $voteObj['img_url'] ."';";

$out = $db->query($command);

  $percent_hopper = array();
  $percent = array();

  while ($data = $out->fetch_array($resulttype = MYSQL_ASSOC)) {
   $percent_hopper[]  = $data['vote'];
  }

  $percent_val_no = (count(array_keys($percent_hopper, 0)) / count($percent_hopper)) * 100;
  $percent_val_yes = (count(array_keys($percent_hopper, 1)) / count($percent_hopper)) * 100;
  array_push($percent, $percent_val_no);
  array_push($percent, $percent_val_yes);
  array_push($percent, $next_img);




echo json_encode($percent);

  $out->free();
  $db->close();


