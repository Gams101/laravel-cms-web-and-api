<?php

namespace Domain\Page\Actions;

use Domain\Page\DTO\PageRequestData;
use Domain\Page\Page;

class CreatePageAction
{
    public function execute(PageRequestData $data): Page
    {
        $page = Page::create([
            'title' => $data->title,
            'slug' => $data->slug,
            'publish_date' => $data->publish_date,
            'status' => $data->status,
            'parent_id' => $data->parent_id,
        ]);

        return $page;
    }
}
