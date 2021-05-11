<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\{Checkout, ProductIndex, LigaProduct, Home, ProductDetail, Keranjang, History};

Auth::routes();

Route::get('/', Home::class)->name('home');

Route::get("/product", ProductIndex::class)->name("product");
Route::get("/product/detail/{product:nama}", ProductDetail::class)->name("product_detail");
Route::get("/liga/product/{liga:nama}", LigaProduct::class)->name("liga_product");

Route::middleware("auth")->group(function() {
    Route::get("/keranjang", Keranjang::class)->name("keranjang");
    Route::get("/checkout-jersey", Checkout::class)->name("checkout");
    Route::get("/order-history", History::class)->name("history");
});

