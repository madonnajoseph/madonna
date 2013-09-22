function validateForm()
{
    var title = document.forms["blogForm"]["title"].value;
    var post  = document.forms["blogForm"]["post"].value;
    var category  = document.forms["blogForm"]["category"].value;
    
    if (title == null || title == "") //check for empty title
    {
        alert("Title must be filled out");
        return false;
    }
    if (post == null || post == "")//check for empty post
    {
        alert("Post must be filled out");
        return false;
    }
    if(category == "0")
    {
         alert("You must choose a category");
        return false;
    }
return true;
}