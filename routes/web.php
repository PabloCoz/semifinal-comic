<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Comics\ComicStatus;
use App\Http\Livewire\User\ComicUser;
use App\Http\Livewire\User\SearchUsers;
use App\Http\Livewire\User\UserUpdate;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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

Route::get('/', HomeController::class)->name('home');

Route::prefix('comics')->group(function () {
    Route::get('/', [ComicController::class, 'index'])->name('comics.index');
    Route::get('/show/{comic}', [ComicController::class, 'show'])->name('comics.show');
    Route::post('/enrrolled/{comic}', [ComicController::class, 'enrolled'])->name('comics.enrolled');
});

/* Route::resource('user', UserController::class)->names('user'); */

Route::get('/register-creator', UserUpdate::class)->middleware('auth')->name('register-creator');

/* Route::get('/plan', PlanController::class)->name('plan'); */

Route::get('/payment-plan/{plan}', [PaymentController::class, 'index'])->middleware('auth')->name('payment.index');

Route::get('/search-users', SearchUsers::class)->name('search.users');

Route::get('users/{user}', [UserController::class, 'show'])->middleware('auth')->name('users.show');

Route::get('/comics/{comic}/{chapter}', ComicStatus::class)->middleware('auth')->name('comics.status');

Route::post('users/{user}/original', [UserController::class, 'original'])->middleware('auth')->name('users.original');

Route::get('/my-comics', ComicUser::class)->middleware('auth')->name('comics.user');

Route::get('faq', [QuestionController::class, 'index'])->name('faq.index');

Route::post('faq', [QuestionController::class, 'store'])->name('faq.store');

Route::get('info', function () {
    return view('info');
})->name('info');
