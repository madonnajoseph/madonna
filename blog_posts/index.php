<?php

include "connection.php";
include "functions.php";
include "header.php";

$cat = $_GET["cat"];// get categories ID
print $cat; 

get_blog_posts($cat);// Listing Blog from DB

lists_categories();

print "<a href='form.php' title='Blog'>Create A Blog</a>";
include "footer.php";
?>
