<?php

use APP\Models\posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

use App\Http\Controllers\UserController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome' , ['posts' => Post::all()]);
});

Route::get('/posts' , [postController::class , 'index']);

Route::post('/logout' ,[UserController::class , 'logout']);

Route::post('/register', [UserController::class , 'register']);

Route::post('/login', [UserController::class , 'login']);

Route::post('/create-post' , [postController::class , 'create']);