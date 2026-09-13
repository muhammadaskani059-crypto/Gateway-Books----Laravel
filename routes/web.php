<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\MainController;

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

Route::prefix('admin')->group(function () {
    Route::controller(AuthorController::class)->group(function () {
        // ADMIN AUTHOR'S ROUTE.
        Route::get('author/', 'index')->name('author.all');
        Route::get('author/create', 'create')->name('author.create');
        Route::post('author/store', 'store')->name('author.store');
        Route::get('author/{id}/edit', 'edit')->name('author.edit');
        Route::put('author/update/{id}', 'update')->name('author.update');
        Route::get('author/delete/{id}', 'delete')->name('author.delete');
        Route::get('author/{id}/status', 'status')->name('author.status');

        Route::get('author/active_all_status', 'active_all_status')->name('author.active.all');
        Route::get('author/deactive_all_status', 'deactive_all_status')->name('author.deactive.all');
        Route::get('author/delete_all', 'delete_all')->name('author.delete.all');
    });

    Route::controller(CategoryController::class)->group(function () {
        // ADMIN CATEGORY'S ROUTE.
        Route::get('category/', 'index')->name('category.all');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/store', 'store')->name('category.store');
        Route::get('category/{id}/edit', 'edit')->name('category.edit');
        Route::put('category/update/{id}', 'update')->name('category.update');
        Route::get('category/delete/{id}', 'delete')->name('category.delete');
        Route::get('category/{id}/status', 'status')->name('category.status');
    });

    Route::controller(MediaController::class)->group(function () {
        // ADMIN MEDIA'S ROUTE.
        Route::get('media/', 'index')->name('media.all');
        Route::get('media/create', 'create')->name('media.create');
        Route::post('media/store', 'store')->name('media.store');
        Route::get('media/{id}/edit', 'edit')->name('media.edit');
        Route::put('media/update/{id}', 'update')->name('media.update');
        Route::get('media/delete/{id}', 'delete')->name('media.delete');
        Route::get('media/{id}/status', 'status')->name('media.status');
    });

    Route::controller(BookController::class)->group(function () {
        // ADMIN BOOK'S ROUTE.
        Route::get('book/', 'index')->name('book.all');
        Route::get('book/create', 'create')->name('book.create');
        Route::post('book/store', 'store')->name('book.store');
        Route::get('book/{id}/edit', 'edit')->name('book.edit');
        Route::put('book/update/{id}', 'update')->name('book.update');
        Route::get('book/delete/{id}', 'delete')->name('book.delete');
        Route::get('book/{id}/status', 'status')->name('book.status');
    });

    Route::controller(TeamController::class)->group(function () {
        // ADMIN TEAM'S ROUTE.
        Route::get('team/', 'index')->name('team.all');
        Route::get('team/create', 'create')->name('team.create');
        Route::post('team/store', 'store')->name('team.store');
        Route::get('team/{id}/edit', 'edit')->name('team.edit');
        Route::put('team/update/{id}', 'update')->name('team.update');
        Route::get('team/delete/{id}', 'delete')->name('team.delete');
        Route::get('team/{id}/status', 'status')->name('team.status');
    });
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/admin/profile_update', [HomeController::class, 'profile_update'])->name('profile.update');
    Route::post('/admin/update_password', [HomeController::class, 'update_password'])->name('update.password');
});

require __DIR__ . '/auth.php';

// FRONTEND ROUTES
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
Route::get('/author', [MainController::class, 'author'])->name('author');
Route::get('/author_detail/{slug}', [MainController::class, 'author_detail'])->name('author_detail');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::get('/category/{slug}', [MainController::class, 'category'])->name('category.show');
Route::get('/book/{slug}', [MainController::class, 'book'])->name('book.show');