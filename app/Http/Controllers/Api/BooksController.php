<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = BookResource::collection(Book::with('feedback', 'estimations', 'author', 'genre')->get());
        return $books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string',
            'authors_id' => 'required',
            'genres_id' => 'required',
            'description' => 'required|string',
            'release_date' => 'required',
        ]);

        $book = Book::create([
            'title' => $fields['title'],
            'imagine' => 'imagine',
            'authors_id' => $fields['authors_id'],
            'genres_id' => $fields['genres_id'],
            'description' => $fields['description'],
            'release_date' => $fields['release_date'],
        ]);

        return $book;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BookResource(Book::with('feedback', 'estimations', 'author', 'genre')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Book::findOrFail($id);

        $fields = $request->validate([
            'title' => 'required|string',
            'authors_id' => 'required',
            'genres_id' => 'required',
            'description' => 'required|string',
            'release_date' => 'required',
        ]);

        $article->update([
            'title' => $fields['title'],
            'authors_id' => $fields['authors_id'],
            'genres_id' => $fields['genres_id'],
            'description' => $fields['description'],
            'release_date' => $fields['release_date'],
        ]);
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
    }
}
