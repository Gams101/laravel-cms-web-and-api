<?php

use Domain\Post\Post;

use function Pest\Laravel\deleteJson;

it('can delete a post via api as admin', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    actAsAdmin();
    $result = deleteJson('api/posts/' . $factory->id);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['id' => $factory->id]);
});

it('should not able to delete a post as non-admin', function() {

    /** @var Post */
    $factory = Post::newFactory()->create();

    actAsUser();
    $result = deleteJson('api/posts/' . $factory->id);

    $result->assertForbidden();
});
