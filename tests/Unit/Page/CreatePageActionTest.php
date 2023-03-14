<?php

use Domain\Page\Actions\CreatePageAction;
use Domain\Page\Page;
use Domain\Page\PageRequestData;

it('can create a page via action class', function() {

    /** @var Page $factory */
    $factory = Page::newFactory()->make();

    $data = new PageRequestData(
        title: $factory->title,
        slug: $factory->slug,
        status: $factory->status,
        publish_date: $factory->publish_date,
        parent_id: $factory->parent_id,
    );

    /** @var CreatePageAction */
    $action = app(CreatePageAction::class);

    $result = $action->execute($data);

    expect($result)->toBeInstanceOf(Page::class);
    expect($result->title)->toEqual($data->title);
});
