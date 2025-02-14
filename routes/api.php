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

//Public route
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('/allGenres', [\App\Http\Controllers\Api\GenreController::class, 'index']);
Route::get('/genre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'show']);

Route::get('/books', [\App\Http\Controllers\Api\BooksController::class, 'index']);
Route::get('/book/{id}', [\App\Http\Controllers\Api\BooksController::class, 'show']);

Route::get('/allAuthors', [\App\Http\Controllers\Api\AuthorsController::class, 'index']);
Route::get('/author/{id}', [\App\Http\Controllers\Api\AuthorsController::class, 'show']);

Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);

//Auth route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/allProfiles', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'index']);
    Route::get('/profile/{id}', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'show']);
    Route::delete('/profile/deleteBook/{id}', [\App\Http\Controllers\Api\BookInTheProfileController::class, 'destroy']);

    Route::put('/updateUser/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);

    Route::post('/estimationsAdd', [\App\Http\Controllers\Api\EstimationController::class, 'store']);

    Route::post('/feedbackAdd', [\App\Http\Controllers\Api\FeedbackController::class, 'store']);
    Route::delete('/deleteFeedback/{id}/user/{users_id}', [\App\Http\Controllers\Api\FeedbackController::class, 'destroy']);

    Route::delete('/deleteUser/{id}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);

    // Admin route
    Route::post('/createAuthor', [\App\Http\Controllers\Api\AuthorsController::class, 'store'])->middleware('isAdmin');

    Route::put('/updateAuthor/{id}', [\App\Http\Controllers\Api\AuthorsController::class, 'update'])->middleware('isAdmin');

    Route::put('/updateBook/{id}', [\App\Http\Controllers\Api\BooksController::class, 'update'])->middleware('isAdmin');
    Route::delete('/deleteBook/{id}', [\App\Http\Controllers\Api\BooksController::class, 'destroy'])->middleware('isAdmin');
    Route::post('/createBook', [\App\Http\Controllers\Api\BooksController::class, 'store'])->middleware('isAdmin');

    Route::delete('/deleteGenre/{id}', [\App\Http\Controllers\Api\GenreController::class, 'destroy'])->middleware('isAdmin');
    Route::post('/createGenre', [\App\Http\Controllers\Api\GenreController::class, 'store'])->middleware('isAdmin');
    Route::put('/genreUpdate/{id}', [\App\Http\Controllers\Api\GenreController::class, 'update'])->middleware('isAdmin');
});

//еще думаю куда их

Route::get('/allFeedbacks', [\App\Http\Controllers\Api\FeedbackController::class, 'index']);
Route::get('/feedback/{id}', [\App\Http\Controllers\Api\FeedbackController::class, 'show']);

Route::get('/allEstimations', [\App\Http\Controllers\Api\EstimationController::class, 'index']);
Route::get('/estimation/{id}', [\App\Http\Controllers\Api\EstimationController::class, 'show']);



