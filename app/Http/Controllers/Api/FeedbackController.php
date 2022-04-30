<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FeedbackResource::collection(Feedback::get());
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
            'users_id' => 'required',
            'book_id' => 'required',
            'feedback' => 'required|string',
        ]);

        $feedback = Feedback::create([
            'users_id' => $fields['users_id'],
            'book_id' => $fields['book_id'],
            'feedback' => $fields['feedback'],
        ]);

        if (Auth::id() != $feedback->users_id) {
            return response(
                ['message' => 'Вы не можете добавлять отзывы на книги от других пользователей'], 401
            );
        }

        return $feedback;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new FeedbackResource(Feedback::findOrFail($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);

        if (auth()->check() && auth()->user()->getAuthIdentifier() === $feedback->id) {
            $deleteFeedback = $feedback->delete();

            return $deleteFeedback;
        }

        return response(
            ['message' => 'Недостаточно прав'], 401
        );
    }
}
