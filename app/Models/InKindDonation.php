<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InKindDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'address2',
        'city',
        'region',
        'postal_code',
        'country',
        'email',
        'phone',
        'country_code',
        'description',
        'estimated_value',
        'date',
        'category',
        'anonymous_donation',
    ];
}
