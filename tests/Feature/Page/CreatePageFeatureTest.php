<?php

use Domain\Page\Page;

use function Pest\Laravel\postJson;
use function Pest\Laravel\withoutExceptionHandling;

it('can create a page via api', function () {

    withoutExceptionHandling();

    $payload = Page::newFactory()->raw();

    loginAsAdmin();
    $response = postJson('api/pages', $payload);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not create a page as non-admin user', function() {

    $payload = Page::newFactory()->raw();

    loginAsUser();
    $response = postJson('api/pages', $payload);

    $response
        ->assertForbidden();
});