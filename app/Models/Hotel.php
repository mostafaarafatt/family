<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'user_id',
        'user_email',
        'country',
        'city',
        'check_in_data',
        'check_out_data',
        'stay_duration',
        'price',
        'payment_method',
        'hotel_image',
        'hotel_rate',
        'adult_number',
        'child_number',
        'currency',
        'supplierConfirmationNum',
        'referenceNum'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
