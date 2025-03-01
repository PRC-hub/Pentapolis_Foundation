<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'first_name', 'last_name', 'birth_date',
        'email', 'phone_code', 'phone_number'
    ];
}

