<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

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

