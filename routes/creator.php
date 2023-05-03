<?php

use App\Http\Controllers\Creator\ComicController;
use App\Http\Livewire\Creator\ComicChapter;
use App\Http\Livewire\Creator\ComicObservation;
use App\Http\Livewire\Creator\ImageChapter;
use Illuminate\Support\Facades\Route;

Route::resource('comics', ComicController::class)->middleware('can:Listar Comic (creador)')->names('creator.comics');

Route::get('comics/{comic}/chapter', ComicChapter::class)->name('creator.comics.chapter');

Route::get('comics/chapter/{chapter}', ImageChapter::class)->name('creator.comics.images');

Route::post('comics/{comic}/status', [ComicController::class, 'status'])->name('creator.comics.status');

Route::get('comics/{comic}/observations', ComicObservation::class)->name('creator.comics.observations');
