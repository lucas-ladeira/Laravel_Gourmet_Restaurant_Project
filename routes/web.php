<?php

use Illuminate\Support\Facades\Route;

// Routes du BackOffice
Route::get('/', function () {
    return view('backOffice');
});
