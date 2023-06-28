<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('admin.home');

Route::get('plans', [PlanController::class, 'index'])->name('admin.plans.index');

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('sliders', SliderController::class)->names('admin.sliders');

Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');

Route::group(['prefix' => 'comics'], function () {
    Route::get('/', [ComicController::class, 'index'])->name('admin.comics.index');
    Route::get('/{comic}', [ComicController::class, 'show'])->name('admin.comics.show');
    Route::post('/{comic}/approved', [ComicController::class, 'approved'])->name('admin.comics.approved');
});
