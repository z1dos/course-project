<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function getFullNameAttribute()
    {
        return $this->author_surname . ' ' . $this->author_name . ' ' . $this->author_patronymic;
    }

    public function authorList($collection)
    {
        foreach ($collection as $item){
            $newArr[] = $item['author_surname'];
        }
        return implode(',', $newArr);
    }

    protected $fillable = [
        'author_avatar',
        'author_surname',
        'author_name',
        'author_patronymic',
        'date_of_birth',
        'date_of_death',
    ];

    protected $appends = ['full_name'];
}
