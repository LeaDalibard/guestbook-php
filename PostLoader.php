<?php
declare(strict_types=1);

/*Handle multiple posts and save them to the same page*/

class PostLoader
{
    /** @var array Post[] */
    // specify that PostLoader is an array of Post
    private array $posts;

    public function __construct()
    {   $message = file_get_contents("messages.json");
        $data = json_decode($message, true); // TRUE SUPER IMPORTANT TO ACCESS OBJECT
        $posts=[];

        foreach ($data as $post){
            $post = new Post ($post['title'],$post['user'],$post['content'],new DateTimeImmutable($post['date']['date']));
            array_push($posts, $post);
        }
        $this->posts=$posts;
    }


    public function getPosts()
    {
        return $this->posts;
    }

    public function exportPosts()
    {
        $publicPosts=$this->getPosts();
        $publicPostsArray=[];
        foreach ($publicPosts as $post){
            array_push($publicPostsArray, $post->export());
        }
        return $publicPostsArray;
        //$test=$posts->getPosts();
        //$testexport=$test[0]->export();
        //var_dump($testexport);
    }

    public function addPost(Post $post)
    {
        $arrayMessage=[];
        foreach ($this->posts as $data){
            array_push($arrayMessage,$data->export());
    }
        array_push($arrayMessage, $post->export());
        file_put_contents('messages.json', json_encode($arrayMessage, JSON_PRETTY_PRINT));
    }


}