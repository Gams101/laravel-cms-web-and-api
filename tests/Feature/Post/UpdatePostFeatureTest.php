<?php

use Domain\Post\Post;

use function Pest\Laravel\patchJson;

it('can update a post via api as admin', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    $payload = Post::newFactory()->raw(['title' => 'Updated title']);

    actAsAdmin();
    $result = patchJson('api/posts/' . $factory->id, $payload);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not able to update a post as non-admin', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    $payload = Post::newFactory()->raw(['title' => 'Updated title']);

    actAsUser();
    $result = patchJson('api/posts/' . $factory->id, $payload);

    $result->assertForbidden();
});
