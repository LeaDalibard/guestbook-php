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
    {
        $posts = [];
        $message = file_get_contents("messages.json");
        $data = json_decode($message);
        foreach ($data as $post) {
            $post = new Post($post[0], $post[1], $post[2], $post[3]);
            array_push($posts, $post);
        }
        $this->posts=$posts;
    }
//public function loadAllPosts()
//    {
//        $posts = [];
//        $message = file_get_contents("messages.json");
//        $data = json_decode($message);
//        foreach ($data as $post) {
//            $post = new Post($post[0], $post[1], $post[2], $post[3]);
//            array_push($posts, $post);
//        }
//        //open a file
//        //json_decode or unserialize it
//        //loop over the data from the file
//        // assign each entry to a Post Class
//
//        $data = json_encode('');
//        foreach ($data as $post) {
//            $this->posts[] = new Post($post['title']);
//        }
//    }


    public
    function addPost(Post $post)
    {
        array_push($this->posts, $post->export());
        file_put_contents('messages.json', json_encode($this->posts, JSON_PRETTY_PRINT));

        //add the new message to the array
        //clear the old file
        //json_encode or serialize to the file of the posts array
    }


}