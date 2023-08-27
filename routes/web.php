<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerInvoiceController;
use App\Http\Controllers\InventoryTransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products',[ProductController::class,'index'])->name('product.all');
    Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
    Route::post('/products/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/products/delete',[ProductController::class,'destroy'])->name('product.delete');
    
    Route::get('/customers',[CustomerController::class,'index'])->name('customer.all');
    Route::get('/invoices',[CustomerInvoiceController::class,'index'])->name('billing.all');
    Route::get('/ledgers',[InventoryTransactionController::class,'index'])->name('ledger.all');

});

require __DIR__.'/auth.php';
