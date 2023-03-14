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
            'slug' => $data->slug,
            'publish_date' => $data->publish_date,
            'status' => $data->status,
            'parent_id' => $data->parent_id,
        ]);

        return $post;
    }
}
