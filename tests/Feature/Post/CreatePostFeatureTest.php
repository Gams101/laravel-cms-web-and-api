<?php

use Domain\Post\Post;

use function Pest\Laravel\postJson;

it('can create a post via api as admin', function () {

    $payload = Post::newFactory()->raw();

    actAsAdmin();
    $response = postJson('api/posts', $payload);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not able to create a post as non-admin', function () {

    $payload = Post::newFactory()->raw();

    actAsUser();
    $response = postJson('api/posts', $payload);

    $response->assertForbidden();
});
