<?php

use Domain\Post\Actions\ListPostAction;
use Domain\Post\Post;
use Illuminate\Pagination\LengthAwarePaginator;

it('can list post without paginate value via action class', function() {
    Post::newFactory()->count(5)->create();

    /** @var ListPostAction */
    $action = app(ListPostAction::class);

    /** @var LengthAwarePaginator */
    $list = $action->execute();

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);

    expect($list->items())->toHaveCount(5);
});

it('can list post with paginate value via action class', function() {
    Post::newFactory()->count(5)->create();

    /** @var ListPostAction */
    $action = app(ListPostAction::class);

    $paginate = 3;

    /** @var LengthAwarePaginator */
    $list = $action->execute($paginate);

    expect($list)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($list->items())->toHaveCount($paginate);
});
