<?php

namespace Domain\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'status',
        'publish_date',
        'parent_id',
    ];
}
