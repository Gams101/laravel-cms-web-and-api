<?php

use Domain\Post\Actions\UpdatePostAction;
use Domain\Post\Post;
use Domain\Post\PostRequestData;

it('can update a post via action class', function() {
    /** @var Post $factory */
    $factory = Post::newFactory()->create();

    $data = new PostRequestData(
        title: 'Example Post',
        status: $factory->status,
        publish_date: $factory->publish_date,
    );

    /** @var UpdatePostAction */
    $action = app(UpdatePostAction::class);

    $result = $action->execute($factory, $data);

    expect($result)->toBeInstanceOf(Post::class);
    expect($result->title, $data->title);
});
