<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

use App\MagicCategory\InsertController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/lab3', function () {
    return view('lab3');
})->name('lab3');

Route::get('/readers', function () {
    return view('readers');
})->name('readers');

Route::get('/books', function () {
    return view('books');
})->name('books');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::post('/insert-reader', [InsertController::class, 'insertReader'])
    ->name('bd-insert-reader');
Route::post('/insert-book', [InsertController::class, 'insertBook'])
    ->name('bd-insert-book');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/contact', function () {
            return view('contact');
        })->name('contact');
        Route::get('/contact/all/{id}/update', [ContactController::class, 'updateMessage'])
            ->name('contact-update');
        Route::get('/contact/all/{id}/delete', [ContactController::class, 'deleteMessage'])
            ->name('contact-delete');
        Route::post('/contact/all/{id}/update/submit', [ContactController::class, 'updateMessageSubmit'])
            ->name('contact-update-submit');
        Route::post('/contact/submit', [ContactController::class, 'submit'])
            ->name('contact-form');
    });
    Route::post('/contact/all/{id}/update/status', [ContactController::class, 'updateMessageStatus'])
        ->name('contact-update-status');
    Route::get('/contact/all',[ContactController::class, 'allData'])
        ->name('contact-data');
    Route::get('/contact/all/{id}', [ContactController::class, 'showOneMessage'])
        ->name('contact-data-one');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

