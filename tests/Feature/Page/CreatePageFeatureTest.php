<?php

use Domain\Page\Page;

use function Pest\Laravel\postJson;
use function Pest\Laravel\withoutExceptionHandling;

it('can create a page via api as admin', function () {

    withoutExceptionHandling();

    $payload = Page::newFactory()->raw();

    actAsAdmin();
    $response = postJson('api/pages', $payload);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['title' => $payload['title']]);
});

it('should not able to create a page as non-admin', function() {

    $payload = Page::newFactory()->raw();

    actAsUser();
    $response = postJson('api/pages', $payload);

    $response->assertForbidden();
});
