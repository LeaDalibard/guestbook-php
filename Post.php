<?php
declare(strict_types=1);

/*Handle single post*/

class Post
{
    private string $title;
    private string $user;
    private string $content;
    private DateTimeImmutable $date ;

    public function __construct(string $title,string $user,string $content,DateTimeImmutable $date)
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


    public function getUser()
    {
        return $this->user;
    }



    public function getContent()
    {
        return $this->content;
    }


    public function getDate()
    {
        return $this->date;
    }


public function export():array{
    $publicArray=[];
    array_push( $publicArray,$this->getTitle(),$this->getUser(),$this->getContent(),$this->getDate());
    return  $publicArray;
}

}