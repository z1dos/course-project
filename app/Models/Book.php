<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function estimations()
    {
        return $this->hasMany(Estimation::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'authors_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genres_id');
    }

    protected $fillable = [
        'title',
        'authors_id',
        'genres_id',
        'description',
        'release_date',
    ];
}
