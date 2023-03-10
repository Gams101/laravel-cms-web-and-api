<?php

use Domain\Page\Page;

use function Pest\Laravel\patchJson;

it('can update a page via api', function() {

    /** @var Page */
    $factory = Page::newFactory()->create();

    $payload = Page::newFactory()->raw(['title' => 'Updated title']);

    loginAsUser();
    $result = patchJson('api/pages/' . $factory->id, $payload);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});
