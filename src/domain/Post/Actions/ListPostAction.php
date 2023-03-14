<?php

namespace Domain\Post\Actions;

use Domain\Post\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPostAction
{
    public function execute(int $paginate = 5): LengthAwarePaginator
    {
        return Post::paginate($paginate);
    }
}
