<?php
declare(strict_types=1);

class PostLoader{
    private array $posts=[];

    public function __construct($posts)
    {
        $this->posts = $posts;
    }
}