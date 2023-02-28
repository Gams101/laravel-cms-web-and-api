<?php

use Domain\Page\Actions\CreatePageAction;
use Domain\Page\DTO\PageRequestData;
use Domain\Page\Page;

test('should create a page via action class', function () {

    $factory = Page::newFactory()->raw();

    $data = new PageRequestData(
        title: $factory['title'],
        slug: $factory['slug'],
        status: $factory['status'],
        publish_date: $factory['publish_date'],
        parent_id: $factory['parent_id'],
    );

    $action = new CreatePageAction();

    $page = $action->execute($data);

    expect($page)->toBeInstanceOf(Page::class);
});
