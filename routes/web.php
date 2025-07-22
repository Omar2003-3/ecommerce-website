<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\userWeb\WebController;
use App\Http\Controllers\userWeb\UIProductController;
use App\Http\Middleware\adminMiddleWare;

// Public Routes (Homepage)
Route::get('/',[WebController::class,'view'])->name('index');
Route::get('/productFront',[UIProductController::class,'index'])->name('productFront');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([adminMiddleWare::class])->group(function(){
    Route::get('/index',[MasterController::class,'view'])->name('dashbord.homepage'); // el mfrood fe error bs m4 bayn lazm a3mel import

    Route::get('category/create',[CategoryController::class,'view'])->name('category.view');
    
    Route::post('category/create',[CategoryController::class,'storeCategory'])->name('category.store');
    
    Route::get('category/List',[CategoryController::class,'show'])->name('category.show');
    
    Route::get('category/{id}/editCategory',[CategoryController::class,'edit'])->name('category.edit');
    
    Route::put('category/{id}/editCategory',[CategoryController::class,'update'])->name('category.update');
    
    Route::delete('category/{id}/deleteCategory',[CategoryController::class,'destroy'])->name('category.destroy');
    
    
    
    
    Route::get('product/create', [ProductController::class, 'view'])->name('product.view');
    
    Route::post('product/create', [ProductController::class, 'storeProduct'])->name('product.storeProduct');
    
    Route::get('product/List', [ProductController::class, 'show'])->name('product.show');
    
    Route::get('product/{id}/editProduct', [ProductController::class, 'edit'])->name('product.edit');
    
    Route::put('product/{id}/editProduct', [ProductController::class, 'update'])->name('product.update');
    
    Route::delete('product/{id}/deleteProduct', [ProductController::class, 'destroy'])->name('product.destroy');

});
#############################################################################3
//auth routes

Route::get('/dashboard', function () {
    return view('master');
})->middleware(['auth', 'verified', adminMiddleWare::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
});

require __DIR__.'/auth.php';