<?php

use Domain\Post\Post;

use function Pest\Laravel\deleteJson;

it('can delete a post via api', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    loginAsAdmin();
    $result = deleteJson('api/posts/' . $factory->id);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['id' => $factory->id]);
});

it('should not able to delete a post as non-admin', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    loginAsUser();
    $result = deleteJson('api/posts/' . $factory->id);

    $result->assertForbidden();
});
