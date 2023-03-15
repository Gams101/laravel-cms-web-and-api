<?php

use Domain\Page\Page;

use function Pest\Laravel\getJson;

it('can list pages via api as admin', function() {

    Page::newFactory()->count(5)->create();

    actAsAdmin();
    $response = getJson('api/pages/list');

    $response->assertSuccessful();
});

it('should not able to list pages as non-admin', function() {

    Page::newFactory()->count(5)->create();

    actAsUser();
    $response = getJson('api/pages/list');

    $response->assertForbidden();
});
