<?php

use Domain\Page\Page;

use function Pest\Laravel\getJson;

it('can list posts via api', function() {

    Page::newFactory()->count(5)->create();

    loginAsUser();
    $response = getJson('api/pages/list');

    $response
        ->assertSuccessful();
});
