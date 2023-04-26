<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['city_name'];
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
