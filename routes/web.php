<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

//ブックマークのルーティング
Route::resource('bookmarks', BookmarkController::class);

//ユーザーのルーティング
Route::resource('users', UserController::class);