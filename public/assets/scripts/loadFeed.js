var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("feed").innerHTML =
      this.responseText;
    }
  };
xhttp.open("GET", "/Feed/Trending", true);
xhttp.send();
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