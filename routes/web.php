<?php

use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function ($locale) {
    $previousUrl = url()->previous();
    $availableLocales = config('app.available_locales');
    $pattern = '/' . implode('|', $availableLocales) . '/';
    $newUrl = preg_replace($pattern, $locale, $previousUrl);
    return redirect($newUrl);
})->where('locale', implode('|', config('app.available_locales')));


Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {
    Route::group(["prefix" => "{locale}"], function () {
        Route::get('/', function () {
            return view('pages.home');
        });
    });
});




