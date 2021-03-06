<?php

namespace App\Models;

use App\Models\BaseModel;
use Shipu\Watchable\Traits\WatchableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Section extends BaseModel implements HasMedia
{
    use HasSlug, WatchableTrait, HasMediaTrait;

    protected $table       = 'sections';
    protected $auditColumn = true;
    protected $fillable    = ['name', 'slug', 'status'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

}
