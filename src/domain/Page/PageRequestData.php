<?php

namespace Domain\Page;

use DateTime;

class PageRequestData
{
    public function __construct(
		public string $title,
		public string $status,
		public string $publish_date,
		public ?int $parent_id,
	) {
	}

    public static function fromRequest()
    {
        //
    }
}
