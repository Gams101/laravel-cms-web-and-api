<?php

use Domain\Page\Actions\ListPageAction;
use Domain\Page\Page;
use Illuminate\Pagination\LengthAwarePaginator;

it('can list page without paginate value via action class', function() {
    Page::newFactory()->count(5)->create();

    /** @var ListPageAction */
    $action = app(ListPageAction::class);

    /** @var LengthAwarePaginator */
    $list = $action->execute();

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);

    expect($list->items())->toHaveCount(5);
});

it('can list page with paginate value via action class', function() {
    Page::newFactory()->count(5)->create();

    /** @var ListPageAction */
    $action = app(ListPageAction::class);

    $paginate = 3;

    /** @var LengthAwarePaginator */
    $list = $action->execute($paginate);

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($list->items())->toHaveCount($paginate);
});
