<?php

use Domain\Post\Post;

use function Pest\Laravel\getJson;

it('can list posts via api as admin', function() {

    Post::newFactory()->count(5)->create();

    actAsAdmin();
    $response = getJson('api/posts/list');

    $response->assertSuccessful();
});

it('should not able to list posts as non-admin', function() {

    Post::newFactory()->count(5)->create();

    actAsUser();
    $response = getJson('api/posts/list');

    $response->assertForbidden();
});
