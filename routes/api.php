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

Route::middleware('isAdmin')->get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::put('/updateUser/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);

Route::get('/allProfiles', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'index']);
Route::get('/profile/{id}', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'show']);

Route::get('/books', [\App\Http\Controllers\Api\BooksController::class, 'index']);
Route::get('/book/{id}', [\App\Http\Controllers\Api\BooksController::class, 'show']);

Route::get('/allFeedbacks', [\App\Http\Controllers\Api\FeedbackController::class, 'index']);
Route::get('/feedback/{id}', [\App\Http\Controllers\Api\FeedbackController::class, 'show']);

Route::get('/allEstimations', [\App\Http\Controllers\Api\EstimationController::class, 'index']);
Route::get('/estimation/{id}', [\App\Http\Controllers\Api\EstimationController::class, 'show']);

Route::get('/allAuthors', [\App\Http\Controllers\Api\AuthorsController::class, 'index']);
Route::get('/author/{id}', [\App\Http\Controllers\Api\AuthorsController::class, 'show']);

Route::get('/allGenres', [\App\Http\Controllers\Api\GenreController::class, 'index']);
Route::get('/genre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'show']);


