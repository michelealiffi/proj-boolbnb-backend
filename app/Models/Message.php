<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'content', 'apartment_id'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
