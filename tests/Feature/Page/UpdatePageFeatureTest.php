<?php

use Domain\Page\Page;

use function Pest\Laravel\patchJson;

it('can update a page via api as admin', function() {

    /** @var Page */
    $factory = Page::newFactory()->create();

    $payload = Page::newFactory()->raw(['title' => 'Updated title']);

    actAsAdmin();
    $result = patchJson('api/pages/' . $factory->id, $payload);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not able to update a page as non-admin', function() {

    /** @var Page */
    $factory = Page::newFactory()->create();

    $payload = Page::newFactory()->raw(['title' => 'Updated title']);

    actAsUser();
    $result = patchJson('api/pages/' . $factory->id, $payload);

    $result->assertForbidden();
});
