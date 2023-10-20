<?php

use App\Http\Controllers\PostsController;
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

Route::get('/', function (){
    return ['message' => 'Hello World'];
});
Route::get('posts', function (){
    return ['posts' => [
        [
            'id' => 1,
            'title' => 'Programing',
            'description' => 'This post about programming',
            'body' => 'In 2023 we have a lot of good programming languages, the mos popular are: JavaScript, Php, Golang, Python', 'Java', 'C#', 'C++'
        ],
        [
            'id' => 2,
            'title' => 'University in Almaty',
            'description' => 'This post about universities that located In Almaty',
            'body' => 'If you want to join to universities, firstful you have to think about Almaty'
        ],
        [
            'id' => 3,
            'title' => 'Computers',
            'description' => 'This post about computers',
            'body' => 'Nowadays in companies use DeLL, Lenovo and etc. computers'
        ],

    ]];
});

Route::get('posts-controller', [PostsController::class, 'index']);
Route::get('post/{id}', [PostsController::class, 'getPostById']);
Route::get('post-all', [PostsController::class, 'getAll']);
Route::post('post-create', [PostsController::class, 'create']);
Route::put('post-update/{post}', [PostsController::class, 'update']);

//Second lesson laravel
Route::post('post-store', [PostsController::class, 'store']);
Route::get('post-by-title', [PostsController::class, 'getPostByTitle']);
