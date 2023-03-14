<?php

namespace Domain\Page\Actions;

use Domain\Page\Page;
use Domain\Page\PageRequestData;

class UpdatePageAction
{
    public function execute(Page $page, PageRequestData $data): Page
    {
        $page->title = $data->title;
        $page->publish_date = $data->publish_date;
        $page->status = $data->status;
        $page->parent_id = $data->parent_id;

        $page->save();

        return $page;
    }
}
