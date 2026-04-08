<?php

declare(strict_types=1);

use App\Http\Controllers\Api\FetchPinController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'routes', 'as', 'routes.', 'middleware' => ['api']], function () {

    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.',
        'middleware' => [
            'guest',
            'throttle.auth',
        ],
    ], function () {
        Route::get('pins', FetchPinController::class)
            ->name('pins');

        Route::get('stops', [FetchPinController::class, 'fetchStop'])
            ->name('stops');
    });

});
