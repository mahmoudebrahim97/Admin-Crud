<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check.account.status'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('product.categoryTreeview');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// user index //
Route::get('userIndex', [UserController::class, 'userIndex'])->name('userIndex')->middleware('auth');

//mails//
Route::get('mail/{id}', [MailController::class, 'mail'])->name('mail');
Route::post('send_mail', [MailController::class, 'send_mail'])->name('send_mail');
Route::get('mail_to_all_users', [MailController::class, 'mail_to_all_users'])->name('mail_to_all_users');
Route::post('send_mail_all_users', [MailController::class, 'send_mail_all_users'])->name('send_mail_all_users');

//categories and subs//
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('subcategories/{id}',[CategoryController::class,'subcategories'])->name('subcategories');
Route::post('categoryStore',[CategoryController::class,'store'])->name('store');
Route::get('categoryCreate/{id}',[CategoryController::class,'create'])->name('create');
Route::get('categoryCreateMain',[CategoryController::class,'create'])->name('createMain');
Route::get('categoryEdit/{id}',[CategoryController::class,'edit'])->name('edit');
Route::post('categoryUpdate/{id}',[CategoryController::class,'update'])->name('update');
Route::delete('categoryDestroy/{id}',[CategoryController::class,'destroy'])->name('destroy');

