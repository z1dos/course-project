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

Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::put('/updateUser/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::post('/createUser', [\App\Http\Controllers\Api\UserController::class, 'store']);
Route::delete('/deleteUser/{id}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);

Route::get('/allProfiles', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'index']);
Route::get('/profile/{id}', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'show']);
Route::delete('/profile/deleteBook/{id}', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'destroy']);

Route::get('/books', [\App\Http\Controllers\Api\BooksController::class, 'index']);
Route::get('/book/{id}', [\App\Http\Controllers\Api\BooksController::class, 'show']);
Route::put('/updateBook/{id}', [\App\Http\Controllers\Api\BooksController::class, 'update']);
Route::delete('/deleteBook/{id}', [\App\Http\Controllers\Api\BooksController::class, 'destroy']);
Route::post('/createBook', [\App\Http\Controllers\Api\BooksController::class, 'store']);

Route::get('/allFeedbacks', [\App\Http\Controllers\Api\FeedbackController::class, 'index']);
Route::get('/feedback/{id}', [\App\Http\Controllers\Api\FeedbackController::class, 'show']);
Route::delete('/deleteFeedback/{id}', [\App\Http\Controllers\Api\FeedbackController::class, 'destroy']);

Route::get('/allEstimations', [\App\Http\Controllers\Api\EstimationController::class, 'index']);
Route::get('/estimation/{id}', [\App\Http\Controllers\Api\EstimationController::class, 'show']);

Route::get('/allAuthors', [\App\Http\Controllers\Api\AuthorsController::class, 'index']);
Route::get('/author/{id}', [\App\Http\Controllers\Api\AuthorsController::class, 'show']);

Route::get('/allGenres', [\App\Http\Controllers\Api\GenreController::class, 'index']);
Route::get('/genre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'show']);
Route::put('/updateGenre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'update']);
Route::delete('/deleteGenre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'destroy']);
Route::post('/createGenre', [\App\Http\Controllers\Api\GenreController::class, 'store']);


