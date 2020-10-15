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

$title =$_POST['title'];
$user=$_POST['user'];
$content=$_POST['content'];
$date=date("Y/m/d");


$post=new Post($title,$user,$content,$date);

$posts=[];

array_push($posts,$post);

var_dump($posts);

file_put_contents('messages.json',json_encode($posts,JSON_PRETTY_PRINT),FILE_APPEND);
//json_encode($this->msgArray,JSON_PRETTY_PRINT);

require 'view.php';