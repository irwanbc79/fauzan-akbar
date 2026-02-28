<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Articles
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Videos
Route::get('/video', [VideoController::class, 'index'])->name('videos.index');
Route::get('/video/{video:slug}', [VideoController::class, 'show'])->name('videos.show');

// Downloads
Route::get('/unduhan', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/unduhan/{download}/download', [DownloadController::class, 'download'])->name('downloads.download');

// Questions (Tanya Jawab)
Route::post('/pertanyaan', [QuestionController::class, 'store'])->name('questions.store');
