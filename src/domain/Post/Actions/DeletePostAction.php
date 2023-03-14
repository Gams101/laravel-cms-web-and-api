<?php

namespace Domain\Post\Actions;

use Domain\Post\Post;

class DeletePostAction
{
    public function execute(Post $post): Post
    {
        $post->delete();

        return $post;
    }
}
