<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerInvoiceController;
use App\Http\Controllers\InventoryTransactionController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/products/{id}/show',[ProductController::class,'show'])->name('product.show');
    Route::post('/products/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/products/delete',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('/product/stock',[ProductController::class,'stockIndex'])->name('product.stock.index');

    Route::get('/customers',[CustomerController::class,'index'])->name('customer.all');
    Route::get('/customers/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/customers/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('/customers/{id}/show',[CustomerController::class,'show'])->name('customer.show');
    Route::patch('/customers/update',[CustomerController::class,'update'])->name('customer.update');
    Route::delete('/customers/delete',[CustomerController::class,'delete'])->name('customer.delete');
    Route::get('/customers/invoice/all',[CustomerController::class,'delete'])->name('customer.invoice.all');
    Route::get('/customers/invoice/create',[CustomerController::class,'delete'])->name('customer.invoice.create');
    Route::get('/customers/invoice/show',[CustomerController::class,'delete'])->name('customer.invoice.show');
    Route::get('/customers/invoice/update',[CustomerController::class,'delete'])->name('customer.invoice.update');
    Route::get('/customers/invoice/preview',[CustomerController::class,'delete'])->name('customer.invoice.preview');
    Route::get('/customers/invoice/delete',[CustomerController::class,'delete'])->name('customer.invoice.delete');
    
    Route::get('/invoices',[CustomerInvoiceController::class,'index'])->name('billing.all');
    Route::get('/ledgers',[InventoryTransactionController::class,'index'])->name('ledger.all');

});

require __DIR__.'/auth.php';
