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
     <script type="text/javascript">

       function vote(vote) {
         var vote_value = vote;

       }
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

      xmlhttp.open('POST', 'handle.php', true);
      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlhttp.send("data=" + encodeURIComponent(vote_string));

      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var vote_response = xmlhttp.responseText;
      if (!(vote_response)) {
      alert("no response");
      }

     </script>

    </head>
    <body>
      <div>
        Goo
        <form method="POST" action="control.php">
        <button onclick="vote()">H</button>
        </form>
      </div>
    </body>
  </html>