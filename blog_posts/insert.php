<?php 
include "blogpost.php";

$title = $_POST["title"];
$post  = $_POST["post"];
$category = $_POST["category"];


$blog = new BlogPost("1",$title ,$post ,$category,"28-4-1991");

?>