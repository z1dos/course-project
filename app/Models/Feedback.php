<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'book_id',
        'feedback',
        'users_id',
    ];
}
