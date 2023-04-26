<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Manager extends Authenticatable implements HasMedia
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

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
