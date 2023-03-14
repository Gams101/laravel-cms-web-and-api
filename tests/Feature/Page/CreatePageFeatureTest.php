<?php

use Domain\Page\Page;

use function Pest\Laravel\postJson;

it('can create a page via api', function () {

    $payload = Page::newFactory()->raw();

    loginAsUser();
    $response = postJson('api/pages', $payload);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});
