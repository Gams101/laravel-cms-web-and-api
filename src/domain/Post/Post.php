<?php

namespace Domain\Post;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    protected $fillable = [
        'title',
        'slug',
        'status',
        'publish_date',
        'parent_id',
    ];

}
