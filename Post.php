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

// ------> making an export function so I can see my private attribute when exporting then in json
public function export():array{
    $publicArray = array('title' => $this->getTitle(), 'user' => $this->getUser(), 'content' => $this->getContent(), 'date' => $this->getDate());
    return  $publicArray;
}

}