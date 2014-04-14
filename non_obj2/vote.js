

function Vote (vote){
    this.voteValue = vote;
    this.img_url;
    this.vote_response;

    this.setInfo = function (vote_info){
        var img_pattern = /\.\/gallery\/(.*?\.(?:jpg|jpeg|gif|png|bmp))$/i; //checks to make sure only files with "valid" extensions are accepted1dd
        var img_path = document.getElementById("main_img").getAttribute("src");
        this.img_url = img_path.match(img_pattern);

        var vote_info = {vote_val: this.voteValue,
            img_url: this.img_url};

        return vote_info;

    };

    this.ajax = function (vote_info) {


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

        xmlhttp.open("POST", "control2.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("data=" + encodeURIComponent(vote_string));

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               this.vote_response = xmlhttp.responseText;
                if (!(this.vote_response)) {
                    alert("no response");
                }
            }
            alert(JSON.parse(this.vote_response));


        }

    }
    //var vote_response = "doom";

}


var vote_yes = new Vote(1);
vote_yes.voteValue = 1;
if(vote_yes.vote_response) {
  //vote_yes.setInfo(JSON.parse(vote_response));
  vote_yes.ajax(vote_yes.setInfo(JSON.parse(vote_yes.vote_response)));
}


//var newVote = new Vote(vote);

/*
var vote = function (vote_val) {
    var vote_value = vote_val;

    var img_pattern = /\.\/gallery\/(.*?\.(?:jpg|jpeg|gif|png|bmp))$/i; //checks to make sure only files with "valid" extensions are accepted1dd
    var img_path = document.getElementById("main_img").getAttribute("src");
    var img_url = img_path.match(img_pattern);

    var vote_info = {vote_val: toString(vote_value),
                     img_url: img_url};

    //document.getElementById("test").innerHTML =vote_value;
// From here it will go into this.ajax method. Before it will be in setInfo

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

xmlhttp.open("POST", "control2.php", true);
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

    return vote_response;
}
    var out = document.getElementById("test");
    out.innerHTML = JSON.parse(vote_response['img_url']);
}

*/
