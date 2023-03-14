<?php

namespace Domain\Page\Actions;

use Domain\Page\Page;
use Domain\Page\PageRequestData;

class CreatePageAction
{
    public function execute(PageRequestData $data): Page
    {
        $page = Page::create([
            'title' => $data->title,
            'publish_date' => $data->publish_date,
            'status' => $data->status,
            'parent_id' => $data->parent_id,
        ]);

        return $page;
    }
}
