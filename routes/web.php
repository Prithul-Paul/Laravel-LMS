<?php

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
    return redirect()->to('dashboard');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...'
]);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    
    /* Author Routes Start */
    Route::prefix('authors')->group(function() {
        Route::get('/', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors');
        Route::get('/create', [App\Http\Controllers\AuthorController::class, 'create'])->name('authors.create');
        Route::post('/create_process', [App\Http\Controllers\AuthorController::class, 'store'])->name('authors.create_process');
        Route::get('/edit/{author}', [App\Http\Controllers\AuthorController::class, 'edit'])->name('authors.edit');
        Route::put('/update/{author}', [App\Http\Controllers\AuthorController::class, 'update'])->name('authors.update');
        Route::get('/delete/{id}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('authors.destroy');

    });
    /* Author Routes End */

    /* Publisher Routes Start */
    Route::prefix('publishers')->group(function() {
        Route::get('/', [App\Http\Controllers\PublisherController::class, 'index'])->name('publishers');
        Route::get('/create', [App\Http\Controllers\PublisherController::class, 'create'])->name('publishers.create');
        Route::post('/create_process', [App\Http\Controllers\PublisherController::class, 'store'])->name('publishers.create_process');
        Route::get('/edit/{publisher}', [App\Http\Controllers\PublisherController::class, 'edit'])->name('publishers.edit');
        Route::put('/update/{publisher}', [App\Http\Controllers\PublisherController::class, 'update'])->name('publishers.update');
        Route::get('/delete/{id}', [App\Http\Controllers\PublisherController::class, 'destroy'])->name('publishers.destroy');

    });
    /* Publisher Routes End */

    /* Category Routes Start */
    Route::prefix('categories')->group(function() {
        Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
        Route::get('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create_process', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.create_process');
        Route::get('/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    /* Category Routes End */

    /* Book Routes Start */
    Route::prefix('books')->group(function() {
        Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books');
        Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
        Route::post('/create_process', [App\Http\Controllers\BookController::class, 'store'])->name('books.create_process');
        Route::get('/edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
        Route::put('/update/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
        Route::get('/delete/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
    });
    /* Book Routes End */

    /* Student Routes Start */
    Route::prefix('students')->group(function() {
        Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('students');
        Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
        Route::post('/create_process', [App\Http\Controllers\StudentController::class, 'store'])->name('students.create_process');
        Route::get('/edit/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
        Route::put('/update/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
        Route::get('/delete/{book}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('students.destroy');
    });
    /* Student Routes End */

    /* Book Issue Routes Start */
    Route::prefix('book-issues')->group(function() {
        Route::get('/', [App\Http\Controllers\BookIssueController::class, 'index'])->name('book-issues');
        Route::get('/create', [App\Http\Controllers\BookIssueController::class, 'create'])->name('book-issues.create');
        Route::post('/create_process', [App\Http\Controllers\BookIssueController::class, 'store'])->name('book-issues.create_process');
        Route::get('/edit/{book}', [App\Http\Controllers\BookIssueController::class, 'edit'])->name('book-issues.edit');
        Route::put('/update/{book}', [App\Http\Controllers\BookIssueController::class, 'update'])->name('book-issues.update');
        Route::get('/delete/{book}', [App\Http\Controllers\BookIssueController::class, 'destroy'])->name('book-issues.destroy');
    });
    /* Book Issue Routes End */

});
