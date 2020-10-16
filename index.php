<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Post.php';
require 'PostLoader.php';

session_start();

if (!isset($_POST['title'])){
    $_POST['title']="";
}
if (!isset($_POST['user'])){
    $_POST['user']="";
}
if (!isset($_POST['content'])){
    $_POST['content']="";
}

// Check validity -> make a post validator ? new class



$title =$_POST['title'];
$user=$_POST['user'];
$content=$_POST['content'];
$date=new DateTimeImmutable();

$posts=new PostLoader();

$post = new Post ($title,$user,$content,$date);

$posts->addPost($post);

var_dump($posts);



require 'view.php';