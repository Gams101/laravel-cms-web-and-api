<?php

use Domain\Post\Post;

use function Pest\Laravel\postJson;

it('can list posts via api', function() {
    loginAsUser();

    Post::newFactory()->count(5)->create();

    $response = postJson('api/posts/list', []);

    $response
        ->assertSuccessful();
});
