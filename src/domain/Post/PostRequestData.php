<?php

namespace Domain\Post;

use App\Http\Requests\PostRequestForm;
use DateTime;

class PostRequestData
{
    public function __construct(
		public string $title,
		public string $status,
		public string $publish_date,
	) {
	}

    public static function fromRequest(PostRequestForm $request): self
    {
        $validated = $request->validated();

        return new static(
            title: $validated['title'],
            status: $validated['status'],
            publish_date: $validated['publish_date']
        );
    }
}
