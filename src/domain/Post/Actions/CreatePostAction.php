<?php

namespace Domain\Post\Actions;

use Domain\Post\Post;
use Domain\Post\PostRequestData;

class CreatePostAction
{
    public function execute(PostRequestData $data)
    {
        $post = Post::create([
            'title' => $data->title,
            'publish_date' => $data->publish_date,
            'status' => $data->status,
        ]);

        return $post;
    }
}
