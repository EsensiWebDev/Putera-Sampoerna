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
        })->name("home");

        Route::group(["prefix" => "/aboutus"], function () {
            Route::get('/', function () {
                return view('pages.aboutus');
            })->name('aboutus');

            Route::get("/our-journey", function () {
                return view("pages.ourjourney");
            })->name("aboutus.ourjourney");

            Route::get("/board-member", function () {
                return view("pages.boardmember");
            })->name("aboutus.boardmember");
        });

        Route::group(["prefix" => "/ourpillar"], function () {
            Route::get("/", function () {
                return view("pages.ourpillar");
            })->name("ourpillar");

            Route::get("/sampoerna-school-system", function () {
                return view("pages.sampoerna-school-system");
            })->name("ourpillar.sampoerna-school-system");
        });
    });
});




