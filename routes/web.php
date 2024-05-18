<?php

// use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionSignaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::controller(ObatController::class)->prefix('obat')->group(function() {
    Route::get('/', 'index')->name('obat')->middleware('auth');
    Route::get('/signa', 'signa')->name('signa')->middleware('auth');  
});

Route::controller(TransactionController::class)->prefix('transaksi')->group(function() {
    Route::get('/', 'create')->name('transaksi')->middleware('auth');
});

Route::controller(LoginController::class)->prefix('login')->group(function() {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'actionlogin')->name('actionlogin');
});

// Route::post('store', [StudentsController::class, 'store']);
// Route::get('/read', [StudentsController::class, 'read']);
// Route::get('/showCreate', [StudentsController::class, 'showCreate']);
// Route::get('/showEdit/{id}', [StudentsController::class, 'showEdit']);
// Route::get('/update/{id}',[StudentsController::class,'update']);
// Route::get('/deleteData/{id}',[StudentsController::class,'deleteData']);
// Route::get('/toggleStatus',[StudentsController::class,'toggleStatus']);

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/read', [ObatController::class, 'read']);
Route::get('/read2', [ObatController::class, 'read2']);
Route::get('/showCreate', [ObatController::class, 'showCreate']);

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

Route::get('/transactionsSigna/create', [TransactionSignaController::class, 'create'])->name('transactionsSigna.create');
Route::post('/transactionsSigna', [TransactionSignaController::class, 'store'])->name('transactionsSigna.store');