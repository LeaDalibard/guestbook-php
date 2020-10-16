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
        var_dump($data);
        var_dump($data[0]);
        var_dump($data[0]['title']);
        $dataLength=count($data);
        $arrayTest=[];
        for($i=0;$i<$dataLength;$i++){
                $post = new Post ($data[$i]['title'],$data[$i]['user'], $data[$i]['content'],new DateTimeImmutable());
                array_push($arrayTest, $post);
              }
        // NEED TO FIX DATE FORMAT LATER
        $this->posts=$arrayTest;

        //foreach ($data as $post){
        //$post = new Post ($post['title'],$post['user'], $post['content'],$post['date']);
        //    array_push($this->posts, $post);
        //}
    }
//public function loadAllPosts()
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