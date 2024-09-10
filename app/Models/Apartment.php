<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($apartment) {
            $apartment->slug = static::createUniqueSlug($apartment->name);
        });

        static::updating(function ($apartment) {
            $apartment->slug = static::createUniqueSlug($apartment->name, $apartment->id);
        });
    }

    public static function createUniqueSlug($name, $id = 0)
    {
        // Genera lo slug base
        $slug = Str::slug($name);

        // Verifica se lo slug esiste già
        $slugExists = Apartment::where('slug', $slug)->where('id', '!=', $id)->exists();

        // Aggiungi un numero se lo slug esiste già
        $count = 2;
        while ($slugExists) {
            $newSlug = $slug . '-' . $count;
            $slugExists = Apartment::where('slug', $newSlug)->where('id', '!=', $id)->exists();
            $count++;
        }

        return $slugExists ? $newSlug : $slug;
    }
}
