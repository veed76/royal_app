<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkAuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;





Route::post('/login', [AuthController::class, 'Login'])->name('login');

Route::middleware([checkAuthToken::class])->group(function () {

    Route::get('/', function () {
        return view('login');
    });

    Route::get('/authors', [AuthorController::class, 'getAuthors'])->name('authors.index');

    Route::get('/authors/{id}', [AuthorController::class, 'editAuthor']);

    Route::delete('/author/delete/{id}', [AuthorController::class, 'deleteAuthor']);

    Route::get('/create-book', [BookController::class, 'create'])->name('create.book');

    Route::post('/create-book', [BookController::class, 'store'])->name('store.book');

    Route::get('/books', [BookController::class, 'getBooks'])->name('books.index');

    Route::get('/books/{id}', [BookController::class, 'editBook']);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::delete('/book-delete/{id}', [BookController::class, 'deleteBook']);

    Route::get('/logout', function (Request $request) {

        \DB::table('royal_app_tokens')->where('token_key', Session::get('auth_token'))->delete();
        $request->session()->forget('auth_token');
        Session::flush();
        return redirect('/');
    })->name('logout');
});
