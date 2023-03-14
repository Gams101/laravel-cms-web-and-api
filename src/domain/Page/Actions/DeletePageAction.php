<?php

namespace Domain\Page\Actions;

use Domain\Page\Page;

class DeletePageAction
{
    public function execute(Page $page): Page
    {
        $page->delete();

        return $page;
    }
}
