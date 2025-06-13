<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistFactory> */
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function albums() {
        return $this->hasMany(Album::class);
    }
}
