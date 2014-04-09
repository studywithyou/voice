
var vote = function (vote_val) {
    var vote_value = vote_val;

    var img_pattern = /\.\/gallery\/(.*?\.(?:jpg|jpeg|gif|png|bmp))$/i; //checks to make sure only files with "valid" extensions are accepted1dd
    var img_path = document.getElementById("main_img").getAttribute("src");
    var img_url = img_path.match(img_pattern);

    var vote_info = {vote_val: vote_value,
                     img_url: img_url};


    var vote_string = JSON.stringify(vote_info);


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

xmlhttp.open("POST", "control.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("data=" + encodeURIComponent(vote_string));

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var vote_response = xmlhttp.responseText;
      if (!(vote_response)) {
        alert("no response");
      }
   }
    alert(vote_response);
}
    var out = document.getElementById("test");
    out.innerHTML = JSON.parse(responseText[img_url]);
}

