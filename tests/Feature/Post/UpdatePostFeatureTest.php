<?php

use Domain\Post\Post;

use function Pest\Laravel\patchJson;

it('can update a post via api', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    $payload = Post::newFactory()->raw(['title' => 'Updated title']);

    loginAsUser();
    $result = patchJson('api/posts/' . $factory->id, $payload);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});
