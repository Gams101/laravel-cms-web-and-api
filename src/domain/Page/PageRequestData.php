<?php

namespace Domain\Page;

use App\Http\Requests\PageRequestForm;
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

    public static function fromRequest(PageRequestForm $request): self
    {
        $validated = $request->validated();

        return new static(
            title: $validated['title'],
            status: $validated['status'],
            publish_date: $validated['publish_date'],
            parent_id: $validated['parent_id'],
        );
    }
}
