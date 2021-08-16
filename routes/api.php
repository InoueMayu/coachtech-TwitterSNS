<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::apiResource('/post', PostController::class);
Route::apiResource('/comment', CommentController::class);
