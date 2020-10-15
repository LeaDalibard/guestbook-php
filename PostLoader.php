<?php
declare(strict_types=1);

/*Handle multiple posts and save them to the same page*/

class PostLoader
{
    /** @var array Post[] */
    // specify that PostLoader is an array of Post
  private array $posts;

  //make this a constructor
  public function loadAllPosts()
  {
      $message=file_get_contents("messages.json");
      json_decode($message);
      //open a file
      //json_decode or unserialize it
      //loop over the data from the file
      // assign each entry to a Post Class

      $data=json_encode('');
      foreach($data as $post){
      $this->posts[] = new Post($post['title']);
  }
  }

      public function addPost(Post $post)
  {
      array_push($this->posts,$post);
      file_put_contents('messages.json',json_encode($post,JSON_PRETTY_PRINT));

      //add the new message to the array
      //clear the old file
      //json_encode or serialize to the file of the posts array
  }



}