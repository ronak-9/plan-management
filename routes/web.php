<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ComboPlanController;
use App\Http\Controllers\EligibilityCriteriaController;

Route::get('/', function () {
    return redirect()->route('plan.index');
});

Route::prefix('plan')->name('plan.')->controller(PlanController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/create','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::patch('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});

Route::prefix('combo/plan')->name('combo.plan.')->controller(ComboPlanController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/create','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::patch('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});

Route::prefix('eligibility/criteria')->name('eligibility.criteria.')->controller(EligibilityCriteriaController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/create','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::patch('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});
