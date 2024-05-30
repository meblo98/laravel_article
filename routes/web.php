<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource("commentaire", CommentaireController::class);


Route::resource("articles", ArticleController::class);

Route::get('/', [ArticleController::class, 'index']);
