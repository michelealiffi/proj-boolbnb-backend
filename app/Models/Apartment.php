<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'rooms',
        'bathrooms',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        'image',
        'is_visible'
    ];
}
