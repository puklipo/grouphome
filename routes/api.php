<?php

use Illuminate\Support\Facades\Route;

Route::get('spam', function () {
    return config('spam');
});
