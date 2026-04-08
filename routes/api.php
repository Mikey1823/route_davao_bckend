<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.'], function () {

    Route::group(['as' => 'v1.', 'prefix' => 'v1'], function () {
        require __DIR__.'/davao_routes/api/v1/api.php';
    });

});
