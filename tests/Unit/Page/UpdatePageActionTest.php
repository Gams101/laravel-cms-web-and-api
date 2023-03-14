<?php

use Domain\Page\Actions\UpdatePageAction;
use Domain\Page\Page;
use Domain\Page\PageRequestData;

it('can update a page via action class', function() {
    /** @var Page $factory */
    $factory = Page::newFactory()->create();

    $data = new PageRequestData(
        title: 'Example page',
        slug: $factory->slug,
        status: $factory->status,
        publish_date: $factory->publish_date,
        parent_id: $factory->parent_id,
    );

    /** @var UpdatePageAction */
    $action = app(UpdatePageAction::class);

    $result = $action->execute($factory, $data);

    expect($result)->toBeInstanceOf(Page::class);
    expect($result->title, $data->title);
});
