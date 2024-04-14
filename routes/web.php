<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

Route::get('/', [ContactController::class, 'landingpage'])->name('landing');
Route::get('loginpage', [ContactController::class, 'loginpage'])->name('log');
Route::get('createaccount', [ContactController::class, 'createaccount'])->name('adduser');
Route::post('createaccount', [ContactController::class, 'createuser'])->name('user');
Route::post('loginpage', [ContactController::class, 'login'])->name('signin');

Route::get('index', [ContactController::class, 'index'])->name('tables');
Route::get('homepage', [ContactController::class, 'homepage'])->name('home');
Route::post('logout', [ContactController::class, 'logout']);
Route::get('create', [ContactController::class, 'create'])->name('addcontact');
Route::post('create', [ContactController::class, 'store'])->name('storage');
Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('idet');
Route::put('/{contact}', [ContactController::class, 'update'])->name('updet');
Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('delete');

