<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NailpolishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Routes in this block require authentication, not accessible by users that aren't logged in
Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); //display edit profile form
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');//handle profile updates
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');//delete user profile
   Route::get('/nailpolishes/index', [NailpolishController::class, 'index'])->name('nailpolishes.index');//show a list of nailpolishes
   Route::get('/nailpolishes/create', [NailpolishController::class, 'create'])->name('nailpolishes.create');//display create form
   Route::post('/nailpolishes', [NailpolishController::class, 'store'])->name('nailpolishes.store'); //handle creating a new nailpolish

   Route::get('/nailpolishes/{nailpolish}', [NailpolishController::class, 'show'])->name('nailpolishes.show');//display details of specific nailpolish   
   Route::patch('/nailpolishes/{nailpolish}', [NailpolishController::class, 'update'])->name('nailpolishes.update');//update an exising new nailpolish
   Route::get('/nailpolishes/{nailpolish}/edit', [NailpolishController::class, 'edit'])->name('nailpolishes.edit');//display edit form for existing nail polish
   Route::delete('/nailpolishes/{nailpolish}', [NailpolishController::class, 'destroy'])->name('nailpolishes.destroy');//delete a specific existing nailpolish
});

Route::resource('reviews', ReviewController::class);
Route::post('nailpolishes/{nailpolish}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::resource('categories', CategoryController::class)->middleware('auth');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');



require __DIR__.'/auth.php';