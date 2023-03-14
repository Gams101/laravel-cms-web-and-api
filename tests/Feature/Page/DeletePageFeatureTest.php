<?php

use Domain\Page\Page;

use function Pest\Laravel\deleteJson;

it('can delete a page via api', function() {

    /** @var Page */
    $factory = Page::newFactory()->create();

    loginAsUser();
    $result = deleteJson('api/pages/' . $factory->id);

    $result
        ->assertSuccessful()
        ->assertJsonFragment(['id' => $factory->id]);
});
