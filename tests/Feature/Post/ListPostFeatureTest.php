<?php

use Domain\Post\Post;

use function Pest\Laravel\getJson;

it('can list posts via api', function() {

    Post::newFactory()->count(5)->create();

    loginAsAdmin();
    $response = getJson('api/posts/list');

    $response->assertSuccessful();
});

it('should not able to list posts as non-admin', function() {

    Post::newFactory()->count(5)->create();

    loginAsUser();
    $response = getJson('api/posts/list');

    $response->assertForbidden();
});
