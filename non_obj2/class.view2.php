<?php
//include_once './control.php';
include_once './class.db.php';
//include_once './class.view2.php';

class View2 {
  public $header;
  public $js;
  public $body_upper;
  public $body_lower;
  public $main_img ;

  public function __construct($main_img){

    //$data = $_POST['data'];
    if (isset($_POST['data'])) {
      if ($_POST['img_url']) {
        $this->main_img = $_POST['img_url'];
      }
    }
      else {
       $this->main_img = $main_img;
    }

    $this->header = '<!doctype html><html lang="en"><head><title>New View</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="./object.css">
      <script type="text/javascript" src="./vote.js"></script>';

    $this->js = <<<EOL
      <script type="text/javascript">
        function vote_yes() {
          var vote_yes = new Vote(1);
          vote_yes.voteValue = 1;
          if(vote_yes.vote_response) {
            //vote_yes.setInfo(JSON.parse(vote_response));
            vote_yes.ajax(vote_yes.setInfo(JSON.parse(vote_yes.vote_response)));

          }
       }



      </script>

      </head>
EOL;




    $this->body_upper = '<body> <div class="display">
        <div class="display" id="image">
          <img class = "main_img" id="main_img" src="./gallery/' . $this->main_img . '" alt="main image">';

    $this->body_lower = '</div><!-- end .display#image-->
        <div class="display" id="container">
          <button name = "yes" type="submit" onclick="vote_yes()">H</button>

      </div><!--end .display#container-->
      </div><!-- end.display -->
      <div id = "test"></div>

  </body>
</html>';
  }

  public function display($main_img) {
    $disp = new View2($main_img);
      echo $disp->header;
      echo $disp->js;
      echo $disp->body_upper;
      echo $disp->body_lower;

    }

}