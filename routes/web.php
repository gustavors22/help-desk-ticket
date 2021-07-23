<?php

use App\Http\Controllers\HelpTicketController;
use App\Http\Controllers\SuportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/support/ticket/{id}',  [SuportController::class, 'show'])->name('support.show');
Route::post('/support/ticket/{id}', [SuportController::class, 'update'])->name('support.update');
Route::get('/help/newticket', [HelpTicketController::class, 'create'])->name('help.create');
Route::post('/help/newticket',  [HelpTicketController::class, 'store'])->name('help.store');
Auth::routes();

