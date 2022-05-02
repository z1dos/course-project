<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'author_surname' => 'required|string',
            'author_name' => 'required|string',
            'author_patronymic' => 'required|string',
            'date_of_birth' => 'required',
            'date_of_death' => 'required',
        ]);

        $author = Author::create([
            'author_surname' => $fields['author_surname'],
            'author_name' => $fields['author_name'],
            'author_patronymic' => $fields['author_patronymic'],
            'date_of_birth' => $fields['date_of_birth'],
            'date_of_death' => $fields['date_of_death'],
        ]);

        return $author;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AuthorResource(Author::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Author::findOrFail($id);

        $fields = $request->validate([
            'author_surname' => 'string',
            'author_name' => 'string',
            'author_patronymic' => 'string',
        ]);

        $article->update([
            'author_surname' => $fields['author_surname'],
            'author_name' => $fields['author_name'],
            'author_patronymic' => $fields['author_patronymic'],
        ]);
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
