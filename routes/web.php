<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('guest');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('teacher', TeacherController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('articles', ArticleController::class)->middleware('auth');
Route::resource('baners', BanerController::class)->middleware('auth');
Route::resource('majors', MajorController::class)->middleware('auth');
Route::resource('profiles', ProfileController::class)->middleware('auth')
    ->except('create', 'show', 'destroy', 'edit');

Route::put('toggle/baners/{id}', [BanerController::class, 'toggle'])->name('toggle.baners')->middleware('auth');
Route::put('toggle/majors/{id}', [MajorController::class, 'toggle'])->name('toggle.majors')->middleware('auth');
