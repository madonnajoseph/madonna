<?php

include "connection.php";

function get_blog_posts($cat) {
    print "<div class='allBlogs'>";

    if ($cat == "0") {
        $data = mysql_query("SELECT * FROM blog_posts")
                or die(mysql_error()); // select all blogs
    } else {
        $data = mysql_query("SELECT * FROM blog_posts INNER JOIN categories ON blog_posts.category_id = categories.id where categories.id=" . $cat . " ")
                or die(mysql_error());
    }
    while ($info = mysql_fetch_array($data)) {

        print "<div class='blogInstance'>";

        Print "<a href='myblog.php?id=".$info['id']."'>Title:" . $info['title'] . " </a><br/>";
        Print "Post:" . $info['post'] . " <br>";
        Print "Date" . $info['date_posted'] . " <br>";

        
        print "</div>"; // end blogInstance
    }// end while

    print "</div>"; //end allBlogs
}

function get_single_post(){
    $post_id = $_GET["id"];
//    print  $post_id;
    
     $data = mysql_query("SELECT id, title, post, date_posted FROM blog_posts where id=".$post_id. " ")
                or die(mysql_error()); // select blog
     
    $info = mysql_fetch_array($data);
    
     print "<div class='blogInstance'>";

        Print "<a href='myblog.php?id=".$info['id']."'>Title:" . $info['title'] . " </a><br/>";
        Print "Post:" . $info['post'] . " <br>";
        Print "Date" . $info['date_posted'] . " <br>";

        
        print "</div>"; 
    
    
}


function insert_blog_post() {
//$connection = mysql_connect("localhost", "root", "");


    $insert = 'INSERT INTO blog_posts ' .
            '(title, post, author_id, date_posted) ' .
            'VALUES ("Post1", "Lorem", "5", NOW())';


    $retval = mysql_query($insert, $connection);
    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }
    echo "Entered data successfully <br/>";
}

function lists_categories() {
    $data = mysql_query("SELECT * FROM categories")
            or die(mysql_error());

    print "<a href='index.php?cat=0' title='All'>All</a><br/>";
    while ($info = mysql_fetch_array($data)) {
        Print "<a href='index.php?cat=" . $info['id'] . "' title=" . $info['title'] . ">" . $info['title'] . "</a><br/> ";
    }
}

?>