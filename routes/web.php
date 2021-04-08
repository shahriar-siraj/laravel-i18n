<?php

use Illuminate\Support\Facades\Route;
use ShahriarSiraj\LaravelI18n\Controllers\LocaleController;

Route::get('package', function () {
    return 'yes';
});

Route::get('set-locale/{locale}', [LocaleController::class, 'switchLocale'])->middleware('web');
