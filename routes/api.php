<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'books' => \App\Http\Controllers\Api\BooksController::class,
    'authors' => \App\Http\Controllers\Api\AuthorsController::class,
    'genres' => \App\Http\Controllers\Api\GenreController::class,
    'users' => \App\Http\Controllers\Api\UserController::class,
    'feedback' => \App\Http\Controllers\Api\FeedbackController::class,
    'estimation' => \App\Http\Controllers\Api\EstimationController::class,
    'profile' => \App\Http\Controllers\Api\BookInTheProfileController::class,
]);
