<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HelpTicketController;
use App\Http\Controllers\SuportController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/support/ticket/{id}',  [SuportController::class, 'show'])->name('support.show')->middleware('auth');
Route::post('/support/ticket/{id}', [SuportController::class, 'update'])->name('support.update')->middleware('auth');
Route::post('/support/closeticket/{id}', [SuportController::class, 'closeTicket'])->name('support.closeticket')->middleware('auth');
Route::get('/support/closedtickets/', [SuportController::class, 'getClosedTicketsBySupport'])->name('support.yourclosedtickets')->middleware('auth');
Route::get('/support/closedtickets/all', [SuportController::class, 'getAllClosedTickets'])->name('support.allclosedtickets')->middleware('auth');
Route::get('/support/createuser', [UserController::class, 'createUserView'])->name('support.createuser')->middleware('auth');
Route::post('/support/createuser/', [UserController::class, 'userStore'])->name('support.storeuser')->middleware('auth');

Route::get('/admin/edit/user', [UserController::class, 'userUpdateAccountTypeView'])->name('admin.updateuser')->middleware('auth');
Route::post('/admin/edit/user', [UserController::class, 'userUpdateAccountType'])->name('admin.useraccountup')->middleware('auth');

Route::get('/help/newticket', [HelpTicketController::class, 'create'])->name('help.create')->middleware('auth');
Route::post('/help/newticket',  [HelpTicketController::class, 'store'])->name('help.store')->middleware('auth');

Route::get('profile/', [UserController::class, 'userProfile'])->name('profile')->middleware('auth');
Route::post('profile/update/{id}', [UserController::class, 'userUpdate'])->name('profile.update')->middleware('auth');
Auth::routes();

