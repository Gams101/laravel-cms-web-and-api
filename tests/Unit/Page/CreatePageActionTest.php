<?php

use Domain\Page\Actions\CreatePageAction;
use Domain\Page\DTO\PageRequestData;
use Domain\Page\Page;

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

    $action = new CreatePageAction();

    $page = $action->execute($data);

    expect($page)->toBeInstanceOf(Page::class);
    expect($page->title)->toEqual($data->title);
});
