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
$alert='';
const NUMBER_ARTICLES=20;

if(isset($_POST["articles_number"])){$numberArticles=intval($_POST["articles_number"]);}
else{
    $numberArticles=NUMBER_ARTICLES;
}


if (isset($_POST["submit"])){
    if (empty($_POST["title"]) || empty($_POST["user"]) || empty($_POST["content"])){
       $alert= "Please fill all the fields";
    }
    else{
        $title =htmlspecialchars($_POST['title']);
        $user=htmlspecialchars($_POST['user']);
        $content=htmlspecialchars($_POST['content']);
        $date=new DateTimeImmutable();

        $post = new Post ($title,$user,$content,$date);

        $posts->addPost($post);

    }
}

$publicPosts=$posts->exportPosts();
$reversePosts=array_reverse($publicPosts);


require 'view.php';