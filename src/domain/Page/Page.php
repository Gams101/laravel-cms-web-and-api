<?php

namespace Domain\Page;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }

    protected $fillable = [
        'title',
        'slug',
        'status',
        'publish_date',
        'parent_id',
    ];
}
