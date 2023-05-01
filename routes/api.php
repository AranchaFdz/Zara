<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sales-index', [SalesController::class, 'indexSales'])->name('sales.index');
Route::get('/sales-create', [SalesController::class, 'createSales'])->name('sales.create');
Route::post('/sales-store', [SalesController::class, 'storeSales'])->name('sales.store');
Route::get('/sales-edit/{id}', [SalesController::class, 'editSales'])->name('sales.edit');
Route::put('/sales-update/{id}', [SalesController::class, 'updateSales'])->name('sales.update');
Route::get('/sales-show', [SalesController::class, 'showSales'])->name('sales.show');
Route::get('/sales-destroy/{id}', [SalesController::class, 'destroySales'])->name('sales.destroy');

Route::get('/products-index', [ProductsController::class, 'indexProducts'])->name('products.index');
Route::get('/products-create', [ProductsController::class, 'createProducts'])->name('products.create');
Route::post('/products-store', [ProductsController::class, 'storeProducts'])->name('products.store');
Route::get('/products-edit/{id}', [ProductsController::class, 'editProducts'])->name('products.edit');
Route::put('/products-update/{id}', [ProductsController::class, 'updateProducts'])->name('products.update');
Route::get('/products-show', [ProductsController::class, 'showProducts'])->name('products.show');
Route::get('/products-destroy/{id}', [ProductsController::class, 'destroyProducts'])->name('products.destroy');

Route::get('/brand-index', [BrandController::class, 'indexBrand'])->name('brand.index');
Route::get('/brand-create', [BrandController::class, 'createBrand'])->name('brand.create');
Route::post('/brand-store', [BrandController::class, 'storeBrand'])->name('brand.store');
Route::get('/brand-edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
Route::put('/brand-update/{id}', [BrandController::class, 'updateBrand'])->name('brand.update');
Route::get('/brand-show', [BrandController::class, 'showBrand'])->name('brand.show');
Route::get('/brand-destroy/{id}', [BrandController::class, 'destroyBrand'])->name('brand.destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
