<?php

namespace App\Models;

use App\Models\BaseModel;
use Shipu\Watchable\Traits\WatchableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Banner extends BaseModel implements HasMedia
{
    use WatchableTrait, HasMediaTrait;

    protected $table       = 'banners';
    protected $auditColumn = true;
    protected $fillable    = ['name'];

}
