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
        'beds',
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
            $apartment->slug = static::createUniqueSlug($apartment->title);
        });

        static::updating(function ($apartment) {
            $apartment->slug = static::createUniqueSlug($apartment->title, $apartment->id);
        });
    }

    public static function createUniqueSlug($name, $id = 0)
    {
        $newSlug = "";

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

        return $newSlug ? $newSlug : $slug;
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'apartment_service');
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'apartment_sponsor')
            ->withPivot('start_time', 'end_time')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
