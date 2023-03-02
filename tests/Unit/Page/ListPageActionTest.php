<?php

use Domain\Page\Actions\ListPageAction;
use Domain\Page\Page;
use Illuminate\Pagination\LengthAwarePaginator;

it('can list page without paginate value via action class', function() {
    Page::newFactory()->count(5)->create();

    $action = new ListPageAction();

    /** @var LengthAwarePaginator $list */
    $list = $action->execute();

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);

    expect($list->items())->toHaveCount(5);
});

it('can list page with paginate value via action class', function() {
    Page::newFactory()->count(5)->create();

    $action = new ListPageAction();

    /** @var LengthAwarePaginator $list */
    $paginate = 3;
    $list = $action->execute($paginate);

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($list->items())->toHaveCount($paginate);
});
