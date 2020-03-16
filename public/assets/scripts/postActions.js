function writeComments(i)
{
    var childNodes = document.getElementById(i).childNodes;
    var j = 0
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                j++;
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
                j++;
            }
        }
    }
    childNodes = document.getElementById(i).childNodes;
    //This is magic and I dont know why tf this is working. When I had kept just one for loop it rquired pressing the button twice to remove both comment box and the button. :)
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                j++;
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
                j++;
            }
        }
    }
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                j++;
                
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
                j++;
            }
            else if(classNem === "postComments")
            {
                childNodes[childNode].remove();
                
            }
        }
    }
    if(j != 0)
    {
        return;
    }
    var commentbox = document.createElement('textarea');
    commentbox.rows = 7;
    commentbox.className = "commentBox";
    commentbox.name = "comment";
    document.getElementById(i).appendChild(commentbox);
    var button = document.createElement('span');
    button.textContent = "Submit Comment";
    button.className = "submitComment";
    document.getElementById(i).appendChild(button);
    console.log(i);
    
    
    button.addEventListener('click', function() { 
        var comment = commentbox.value;
        submitComment(comment, i); 
        commentbox.remove();
        button.remove();
    }); 

}
function submitComment(comment, i)
{
   var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        alert("Comment successfuly posted.");
        }
    };
    xhttp.open("POST", "/submitComment", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(i);
    xhttp.send("comment="+comment+"&&postID="+i);
}
var postID;

function showComments(i)
{
    var childNodes = document.getElementById(i).childNodes;
    var j = 0
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
                
            }
        }
    }
    var childNodes = document.getElementById(i).childNodes;
    var j = 0
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
                
            }
        }
    }
    childNodes = document.getElementById(i).childNodes;
    //This is magic and I dont know why tf this is working. When I had kept just one for loop it rquired pressing the button twice to remove both comment box and the button. :)
    for(childNode in childNodes)
    {   
        if (typeof childNodes[childNode].className !== 'undefined') 
        {
            classNem = childNodes[childNode].className;
            console.log(classNem);
            if(classNem === "commentBox")
            {
                childNodes[childNode].remove();
                
            }
            else if(classNem === "submitComment")
            {
                childNodes[childNode].remove();
            }
            else if(classNem === "postComments")
            {
                childNodes[childNode].remove();
                j++;
            }
        }
    }
    if(j != 0)
    {
        return;
    }

    //actual code :
    postID = i
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var x = document.createElement("div");
            x.innerHTML = this.responseText;
            x.className = "postComments";
            console.log(this.responseText);
            document.getElementById(postID).appendChild(x);
        }
    };
    xhttp.open("GET", "/showComments?postID="+i, true);
    xhttp.send();
}

function upvote(i)
{
    postID = i;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            if(this.responseText === "Liked.")
            {
                var count = document.getElementById("likeCount"+postID).innerHTML;
                count++;
                document.getElementById("likeCount"+postID).innerHTML = count;  
            }
        }
    };
    xhttp.open("GET", "/upvote?postID="+i, true);
    xhttp.send();
}