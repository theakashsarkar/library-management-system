<?php

use App\Http\Controllers\Admin\AuthorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PublishersController;
use App\Http\Controllers\Admin\CatagoriesController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\UserController;
use App\Models\author;
use App\Models\Book;
use App\Models\User;
use App\Models\categories;
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
// return User::all();
  return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'isLibrarian'])->group(function () {
    Route::get('/', [PagesController::class, 'index'])->name('admin.index');
    Route::prefix('books')->group(function () {
        Route::get('/', [BooksController::class, 'index'])->name('admin.books.index');
        Route::get('/create', [BooksController::class, 'create'])->name('admin.books.create');
        Route::post('/store', [BooksController::class, 'store'])->name('admin.books.store');
        Route::get('/{id}',   [BooksController::class, 'edit'])->name('admin.books.edit');
        Route::get('/update/{id}', [BooksController::class, 'update'])->name('admin.books.update');
        Route::delete('/delete/{id}', [AuthorsController::class, 'destroy'])->name('admin.authors.delete');
    });
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorsController::class, 'index'])->name('admin.authors.index');
        Route::get('/create', [AuthorsController::class, 'create'])->name('admin.author.create');
        Route::post('/store', [AuthorsController::class, 'store'])->name('admin.authors.store');
        Route::get('/{id}', [AuthorsController::class, 'edit'])->name('admin.authors.edit');
        Route::post('/update/{id}', [AuthorsController::class, 'update'])->name('admin.authors.update');
        Route::delete('/delete/{id}', [AuthorsController::class, 'destroy'])->name('admin.authors.delete');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CatagoriesController::class, 'index'])->name('admin.categories.index');
        Route::post('/store', [CatagoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/create', [CatagoriesController::class, 'create'])->name('admin.categories.create');
        Route::get('/{id}', [CatagoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [CatagoriesController::class, 'update'])->name('admin.categories.update');
        Route::post('/delete/{id}', [CatagoriesController::class, 'destroy'])->name('admin.categories.delete');
    });
    Route::prefix('publishers')->group(function () {
        Route::get('/', [PublishersController::class, 'index'])->name('admin.publishers.index');
        Route::post('/store', [PublishersController::class, 'store'])->name('admin.publishers.store');
        Route::get('/create', [PublishersController::class, 'create'])->name('admin.publishers.create');
        Route::get('/{id}', [PublishersController::class, 'edit'])->name('admin.publishers.edit');
        Route::post('/update/{id}', [PublishersController::class, 'update'])->name('admin.publishers.update');
        Route::post('/delete/{id}', [PublishersController::class, 'destroy'])->name('admin.publishers.delete');
    });
});
    Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
        Route::get('/user-list', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('user-update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
