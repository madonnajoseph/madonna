<?php 
include "connection.php";
class BlogPost  
{  
  
public $id;  
public $title;  
public $post;  
public $category_id;  
public $date_posted;  

function __construct($blog_id, $blog_title, $blog_post, $category_id, $blog_date){
 
    $this->id = $blog_id;
    $this->title = $blog_title;
    $this->post = $blog_post;
    $this->category_id = $category_id;
    $this->date_posted = $blog_date;
    
    
    print "tit is   ".$blog_title."<br/>";
    print "post is  ".$blog_post."<br/>";
    print "cat id is  ".$category_id."<br/>";
    print "blog date is  ".$blog_date."<br/>";
    
    
    $connection = mysql_connect("localhost", "root", "");
    $insert = 'INSERT INTO blog_posts ' .
            '(title, post, category_id, date_posted) ' .
            'VALUES ('.$blog_title.', '.$blog_post.', '.$category_id.', '.$blog_date.')';


    $retval = mysql_query($insert, $connection);
    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }
    echo "Entered data successfully <br/>";
    
    

        
}// end constructor




}// end BlogPost

?>