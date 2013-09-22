<?php

/*
 Connect To the My DB 
 */

$connection = mysql_connect("localhost", "root", "") or 
die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");  
$database = "blog";   //DB Name  
mysql_select_db($database, $connection) or 
die ("<p class='error'>Sorry, we were unable to connect to the database.</p>"); 

?>