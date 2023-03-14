<?php

use Domain\Post\Actions\DeletePostAction;
use Domain\Post\Post;

use function Pest\Laravel\assertDatabaseMissing;

it('can delete a post via action', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    /** @var DeletePostAction */
    $action = app(DeletePostAction::class);

    $result = $action->execute($factory);

    assertDatabaseMissing('posts', ['id' => $factory->id]);
    expect($result)->toBeInstanceOf(Post::class);
});
