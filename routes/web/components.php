<?php

use App\Http\Controllers\Components;
use Illuminate\Support\Facades\Route;

// Components
Route::group(['prefix' => 'components', 'middleware' => ['auth']], function () {
    Route::get(
        '{componentID}/checkout',
        [Components\ComponentCheckoutController::class, 'create']
    )->name('components.checkout.show');

    Route::post(
        '{componentID}/checkout',
        [Components\ComponentCheckoutController::class, 'store']
    )->name('components.checkout.store');

    Route::get(
        '{componentID}/checkin/{backto?}',
        [Components\ComponentCheckinController::class, 'create']
    )->name('components.checkin.show');

    Route::post(
        '{componentID}/checkin/{backto?}',
        [Components\ComponentCheckinController::class, 'store']
    )->name('components.checkin.store');

    Route::post(
        '{componentId}/upload',
        [Components\ComponentsFilesController::class, 'store']
    )->name('upload/component');

    Route::delete(
        '{componentId}/deletefile/{fileId}',
        [Components\ComponentsFilesController::class, 'destroy']
    )->name('delete/componentfile');

    Route::get(
        '{componentId}/showfile/{fileId}/{download?}',
        [Components\ComponentsFilesController::class, 'show']
    )->name('show.componentfile');

});

Route::resource('components', Components\ComponentsController::class, [
    'middleware' => ['auth'],
    'parameters' => ['component' => 'component_id'],
]);
