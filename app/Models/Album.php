<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /** @use HasFactory<\Database\Factories\AlbumFactory> */
    use HasFactory;

    protected $fillable = ['title', 'release_date', 'artist_id', 'genre'];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    } 

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
