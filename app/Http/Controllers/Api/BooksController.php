<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function viewAllBook()
    {
        return Book::all();
    }
}
