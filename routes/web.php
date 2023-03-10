<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\BkkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guest\ArticleController as GuestArticleController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\MajorController as GuestMajorController;
use App\Http\Controllers\Guest\TeacherController as GuestTeacherController;
use Illuminate\Support\Facades\Artisan;

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

// route admin
Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/teacher', TeacherController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/articles', ArticleController::class);
    Route::resource('admin/baners', BanerController::class);
    Route::resource('admin/majors', MajorController::class);
    Route::resource('admin/bkk', MajorController::class);
    Route::resource('admin/profiles', ProfileController::class)
        ->except('create', 'show', 'destroy', 'edit');

    Route::put('toggle/baners/{id}', [BanerController::class, 'toggle'])->name('toggle.baners');
    Route::put('toggle/majors/{id}', [MajorController::class, 'toggle'])->name('toggle.majors');
    Route::put('toggle/bkk/{id}', [BkkController::class, 'toggle'])->name('bkk.majors');
});



//route user
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('guru', [GuestTeacherController::class, 'index'])->name('guest.teachers');
Route::get('jurusan', [GuestMajorController::class, 'index'])->name('guest.majors');
Route::get('jurusan/{id}', [GuestMajorController::class, 'show'])->name('guest.majors.show');
Route::get('kegiatan', [GuestArticleController::class, 'index'])->name('guest.article');
Route::get('kegiatan/{id}', [GuestArticleController::class, 'show'])->name('guest.article.show');
Route::get('kontak', [ContactController::class, 'index'])->name('guest.contact');
Route::get('symlink', function () {
    return response()->json([
        'message' => 'berhasil run symlink'
    ]);
});
