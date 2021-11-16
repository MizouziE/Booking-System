<?php

use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
// Route::module('posts');

Route::group(['prefix' => 'provider'], function () {
    Route::module('services');
});
