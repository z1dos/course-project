<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_surname',
        'author_name',
        'author_patronymic',
        'date_of_birth',
        'date_of_death',
    ];
}
