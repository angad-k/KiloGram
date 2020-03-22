var toggleDP = 0;
function DPtoggler()
{
    if(toggleDP == 0)
    {
        document.getElementById('DPform').style.display = 'block';
        toggleDP = 1;
    }
    else
    {
        document.getElementById('DPform').style.display = 'none';
        toggleDP = 0;
    }
}
var toggleU = 0;
function usernameToggler()
{
    if(toggleU == 0)
    {
        document.getElementById('usernameform').style.display = 'block';
        toggleU = 1;
    }
    else
    {
        document.getElementById('usernameform').style.display = 'none';
        toggleU = 0;
    }
}
function changeUsername()
{
    var newUsername = document.getElementById("newUsername").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
          location.reload();  
        }
      };
    xhttp.open("GET", "/ChangeUsername?newUsername=" + newUsername, true);
    xhttp.send();
}