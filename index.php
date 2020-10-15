<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Post.php';

if (!isset($_POST['title'])){
    $_POST['title']="";
}
if (!isset($_POST['user'])){
    $_POST['user']="";
}
if (!isset($_POST['content'])){
    $_POST['content']="";
}

$title =$_POST['title'];
$user=$_POST['user'];
$content=$_POST['content'];
$date=date("Y/m/d");

$post=new Post($title,$user,$content,$date);

var_dump($post);


require 'view.php';