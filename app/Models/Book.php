<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'explanation',
        'published_at',
        'genre_id',
        'publisher_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    'published_at' => 'date',
    ];

    /**
     * relation
     */
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
