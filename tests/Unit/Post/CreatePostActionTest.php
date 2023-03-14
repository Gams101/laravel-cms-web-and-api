<?php

use Domain\Post\Actions\CreatePostAction;
use Domain\Post\Post;
use Domain\Post\PostRequestData;

it('can create a post via action class', function () {

    /** @var Post */
    $factory = Post::newFactory()->create();

    $data = new PostRequestData(
        title: $factory->title,
        status: $factory->status,
        publish_date: $factory->publish_date,
    );

    /** @var CreatePostAction */
    $action = app(CreatePostAction::class);

    $result = $action->execute($data);

    expect($result)->toBeInstanceOf(Post::class);
    expect($result->title)->toEqual($data->title);
});
