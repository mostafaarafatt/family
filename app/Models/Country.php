<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Country extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['country_name'];
    protected $guarded = [];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
