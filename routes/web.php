<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SalesmanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('proposals/{id}/duplicate', [ProposalController::class, 'duplicate'])->name('proposals.duplicate');
    Route::resource('proposals', ProposalController::class);
    Route::get('/pipeline', [ProposalController::class, 'pipeline'])->name('proposals.pip');
    Route::post('/proposals/update-status', [ProposalController::class, 'updateStatus'])->name('proposals.updateStatus');

    Route::resource('leads', LeadController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('contacts', ContactController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/salesman-index', [SalesmanController::class, 'index'])->name('salesman.index');
    Route::get('/salesman-create', [SalesmanController::class, 'create'])->name('salesman.create');
    Route::post('/salesman-store', [SalesmanController::class, 'store'])->name('salesman.store');
});

require __DIR__.'/auth.php';
