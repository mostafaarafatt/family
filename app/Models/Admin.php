<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Admin extends Authenticatable implements HasMedia
{
    use LaratrustUserTrait, InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_active',
        'password',
    ];

    protected $guard = "admin";

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    public function alpums()
    {
        return $this->hasMany(Alpum::class);
    }


    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
