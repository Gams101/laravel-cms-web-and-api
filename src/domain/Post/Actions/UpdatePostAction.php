<?php

namespace Domain\Post\Actions;

use Domain\Post\Post;
use Domain\Post\PostRequestData;

class UpdatePostAction
{
    public function execute(Post $post, PostRequestData $data): Post
    {
        $post->title = $data->title;
        $post->title = $data->title;
        $post->publish_date = $data->publish_date;
        $post->status = $data->status;

        $post->save();

        return $post;
    }
}
