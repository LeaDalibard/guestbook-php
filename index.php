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

$posts=new PostLoader();

$title =$_POST['title'];
$user=$_POST['user'];
$content=$_POST['content'];
$date=new DateTimeImmutable();

//$post=[];
//array_push($post,$title,$user,$content,$date);

$post = new Post ($title,$user,$content,$date);
$posts->addPost($post);

var_dump($posts);

//file_put_contents('messages.json',json_encode($post->export(),JSON_PRETTY_PRINT));
//$message=file_get_contents("messages.json");
//var_dump(json_decode($message));
//$data = json_decode($message);



//json_encode($this->msgArray,JSON_PRETTY_PRINT);

require 'view.php';