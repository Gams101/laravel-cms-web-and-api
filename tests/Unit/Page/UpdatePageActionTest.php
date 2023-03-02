<?php

use Domain\Page\Actions\UpdatePageAction;
use Domain\Page\DTO\PageRequestData;
use Domain\Page\Page;

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

    $action = new UpdatePageAction();

    $page = $action->execute($factory, $data);

    expect($page)->toBeInstanceOf(Page::class);
    expect($page->title, $data->title);
});
