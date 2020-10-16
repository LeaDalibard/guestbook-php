<?php
declare(strict_types=1);

/*Handle multiple posts and save them to the same page*/

class PostLoader
{
    /** @var array Post[] */
    // specify that PostLoader is an array of Post
    private array $posts;

    //make this a constructor
    public function __construct()
    {   $message = file_get_contents("messages.json");
        $data = json_decode($message, true); // TRUE SUPER IMPORTANT TO ACCESS OBJECT
        $arrayTest=[];
        foreach ($data as $post){
            $post = new Post ($post['title'],$post['user'],$post['content'],new DateTimeImmutable());
            array_push($arrayTest, $post);
        }
        $this->posts=$arrayTest;
    }


    public
    function addPost(Post $post)
    {
        $arrayMessage=[];
        foreach ($this->posts as $data){
            array_push($arrayMessage,$data->export());
    }
        array_push($arrayMessage, $post->export());
        file_put_contents('messages.json', json_encode($arrayMessage, JSON_PRETTY_PRINT));
        //add the new message to the array
        //clear the old file
        //json_encode or serialize to the file of the posts array
    }


}