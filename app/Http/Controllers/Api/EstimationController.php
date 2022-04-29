<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstimationResource;
use App\Models\Estimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EstimationResource::collection(Estimation::get());
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
            'users_id' => 'required',
            'book_id' => 'required',
            'estimation' => 'required|int',
        ]);

        $estimation = Estimation::create([
            'users_id' => $fields['users_id'],
            'book_id' => $fields['book_id'],
            'estimation' => $fields['estimation'],
        ]);

        if (Auth::id() != $estimation->users_id) {
            return response(
                ['message' => 'Вы не можете добавлять оценки на книги от других пользователей'], 401
            );
        }

        return $estimation;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new EstimationResource(Estimation::findOrFail($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
