<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/news')->group(function () {
    Route::get("/", [NewsController::class, 'getList'])->name('news_list');
    Route::get("/{slug}", [NewsController::class, 'getDetails'])->name('news_item');
});
