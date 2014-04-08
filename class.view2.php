<?php
include_once './control.php';
include_once './class.db.php';

class View2 {
  public $header;
  const js = <<<EOL
<script type="text/javascript">
       function vote(vote) {
         var vote_value = vote;


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
       }

      xmlhttp.open("POST", "class.view2.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("data=" + encodeURIComponent(vote_string));

      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var vote_response = xmlhttp.responseText;
      if (!(vote_response)) {
      alert("no response");
      }
    }
  }
}

</script>
EOL;



  public $body_upper;
  public $body_lower;
  public $main_img = "main01.jpg";

  public function __construct($main_img){
    $this->js =  self::js;
    $this->main_img = $main_img;
    $this->header = '<!doctype html><html lang="en"><head><title>New View</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="./object.css">'. $this->js . '</head>';

    $this->body_upper = '<body> <div class="display">
        <div class="display" id="image">
          <img class = "main_img" src="./gallery/' . $main_img . '" alt="main image">';

    $this->body_lower = '</div><!-- end .display#image-->
        <div class="display" id="container">
          <form method="POST" action="vote(1)"><button name = "yes" type="submit" >H</button>
          </form>
      </div><!--end .display#container-->
      </div><!-- end.display

  </body>
</html>';
  }

  public function display($main_img) {
    $disp = new View2($main_img);
      echo $disp->header;
      echo $disp->body_upper;
      echo $disp->body_lower;

    }

}