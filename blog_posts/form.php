<html>
    <head>
    <script type="text/javascript" src="js/validation.js"></script>	
    </head>
    <body>
        <form name="blogForm" action="insert.php" method="post"  onsubmit="return validateForm();">
            Title : <input type ="text" name = "title"/>
            Post  :<textarea name="post"></textarea>
            <select name="category">
                <option value="0">Choose your Category</option>
                <option value="1">Politics</option>
                <option value="2">Economics</option>
                <option value="3">Cars</option>
                <option value="4">Cinema</option>
                <option value="5">Others</option>
            </select>
            <input type ="submit" value = "submit"/>
        </form>
    </body>
</html>