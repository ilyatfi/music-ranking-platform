<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'album_id',
        'score',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function album() {
        return $this->belongsTo(Album::class);
    }
}
