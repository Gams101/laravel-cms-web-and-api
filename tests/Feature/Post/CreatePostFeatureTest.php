<?php

use Domain\Post\Post;

use function Pest\Laravel\postJson;

it('can create a post via api', function () {

    $payload = Post::newFactory()->raw();

    loginAsAdmin();
    $response = postJson('api/posts', $payload);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not able to create a post as non-admin', function () {

    $payload = Post::newFactory()->raw();

    loginAsUser();
    $response = postJson('api/posts', $payload);

    $response->assertForbidden();
});
