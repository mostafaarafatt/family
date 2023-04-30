<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


class Report extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];


    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }

    // public function getImagesAttribute()
    // {
    //     return $this->getMediaResource('report_image');
    // }
}
