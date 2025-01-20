<?php

use Illuminate\Support\Facades\Route;
use App\Pets\Controller\CreateController;
use App\Pets\Controller\GetController;
use App\Pets\Controller\DeleteController;
use App\Pets\Controller\UpdateController;

Route::get('/', function () {
    return view('layouts.index');
})->name('app.index');

Route::get('/pet/create', [CreateController::class, '__invoke'])->name('app.pet.create');
Route::post('/pet/create/store', [CreateController::class, 'store'])->name('app.pet.create.store');

Route::get('/pet/get', [GetController::class, '__invoke'])->name('app.pet.get');
Route::post('/pet/get/store', [GetController::class, 'store'])->name('app.pet.get.store');

Route::get('/pet/delete', [DeleteController::class, '__invoke'])->name('app.pet.delete');
Route::post('/pet/delete/store', [DeleteController::class, 'store'])->name('app.pet.delete.store');

Route::get('/pet/update', [UpdateController::class, '__invoke'])->name('app.pet.update');
Route::post('/pet/update/store', [UpdateController::class, 'store'])->name('app.pet.update.store');
