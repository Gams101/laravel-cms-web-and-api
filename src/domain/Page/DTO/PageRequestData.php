<?php

namespace Domain\Page\DTO;

use DateTime;

class PageRequestData
{
    public function __construct(
		public string $title,
		public string $slug,
		public string $status,
		public string | DateTime $publish_date,
		public ?int $parent_id,
	) {
	}

    public static function fromRequest()
    {
        //
    }
}
