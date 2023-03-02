<?php

namespace Domain\Page\Actions;

use Domain\Page\Page;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPageAction
{
    public function execute(int $paginate = 5): LengthAwarePaginator
    {
        return Page::paginate($paginate);
    }
}
