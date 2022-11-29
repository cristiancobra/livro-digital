<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ReadingController;

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

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'home']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//PROJETOS
// Route::get('projects/status', [ProjectController::class, 'getProjectsStatus']);

Route::middleware('auth:sanctum')->apiResource('books', BookController::class)
	->names('books');


Route::middleware('auth:sanctum')->apiResource('readings', ReadingController::class)
	->names('readings');


// Route::apiResource('/admin/books', BookController::class)
// 		->names('books');