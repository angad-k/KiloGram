
function loadTrending()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("feed").innerHTML =
          this.responseText;
        }
      };
    xhttp.open("GET", "/Feed/Trending", true);
    xhttp.send();
}
function loadAdder()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("feed").innerHTML =
          this.responseText;
        }
      };
    xhttp.open("GET", "/Post", true);
    xhttp.send();
}
function loadLatest()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("feed").innerHTML =
          this.responseText;
        }
      };
    xhttp.open("GET", "/Feed/Latest", true);
    xhttp.send();
}
function loadAccount()
{
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("feed").innerHTML =
          this.responseText;
        }
      };
    xhttp.open("GET", "/Account", true);
    xhttp.send();
}