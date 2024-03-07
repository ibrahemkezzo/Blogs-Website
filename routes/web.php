<?php

use App\Http\Controllers\guest\BlogController;
use App\Http\Controllers\guest\CategoryController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\guest\HomeController;
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

// Route::get('/', function () {
//     return view('guest.pages.index');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

// Route::get('/blogs', function () {
//     return view('guest.pages.blogs');
// });
// // Route::get('/about', function () {
// //     return view('guest.pages.about');
// // });
// // Route::get('/contact', function () {
// //     return view('guest.pages.contact');
// // });
// Route::get('/categories', [CategoryController::class, 'index']);

// Route::get('/blogs', [BlogController::class, 'index']);
//Route::get('/contact', [HomeController::class, 'contact']);


// Route::resource('/contact', ContactController::class);
//region contact.
Route::group(
    [
        "prefix" => 'contact'
    ],

    function() {

       Route::get('/', [ContactController::class, 'index']);
       Route::get('/{contact}', [ContactController::class, 'show']);
       Route::put('/{contact}', [ContactController::class, 'update']);
       Route::get('/{contact}/edit', [ContactController::class, 'edit']);
       Route::get('/create', [ContactController::class, 'create']);
       Route::post('/', [ContactController::class, 'store']);
       Route::delete('/{contact}', [ContactController::class, 'destroy']);
});
//endregion

//region blog.
Route::group(
    [
        "prefix" => 'blog',
        "as" => 'blog.'
    ],

    function() {

       Route::get('/', [BlogController::class, 'index'])->name('index');
       Route::get('/{blog}', [BlogController::class, 'show'])->name('show');
       Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
       Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
       Route::get('/create', [BlogController::class, 'create'])->name('create');
       Route::post('/', [BlogController::class, 'store'])->name('store');
       Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
});
//Route::get('blog/{blog}', [BlogController::class, 'show']);
//endregion


//region category.
// Route::group(
//     [
//         "prefix" => 'category'
//     ],

//     function() {

//        Route::get('/', [CategoryController::class, 'index']);
//        Route::get('/{category}', [CategoryController::class, 'show']);
//        Route::put('/{category}', [CategoryController::class, 'update']);
//        Route::get('/{category}/edit', [CategoryController::class, 'edit']);
//        Route::get('/create', [CategoryController::class, 'create']);
//        Route::post('/', [CategoryController::class, 'store']);
//        Route::delete('/{category}', [CategoryController::class, 'destroy']);
// });
//endregion
