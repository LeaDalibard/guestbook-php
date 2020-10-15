<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private string $user;
    private string $content;
    private $date ;

    public function __construct($title,$user,$content,$date)
    {
        $this->title = $title;
        $this->user = $user;
        $this->content = $content;
        $this->date =  $date;

    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content)
    {
        $this->content = $content;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;
    }


}