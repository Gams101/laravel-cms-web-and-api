<?php

use Domain\Page\Actions\DeletePageAction;
use Domain\Page\Page;

use function Pest\Laravel\assertDatabaseMissing;

it('can delete a page via action', function() {

    /** @var Page */
    $factory = Page::newFactory()->create();

    /** @var DeletePageAction */
    $action = app(DeletePageAction::class);

    $result = $action->execute($factory);

    assertDatabaseMissing('posts', ['id' => $factory->id]);
    expect($result)->toBeInstanceOf(Page::class);
});
