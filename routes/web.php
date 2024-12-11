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
            Route::get('/school-development-outreach', function () {
                return view('pages.school-development');
            })->name('ourpillar.school-development');
            Route::get('/scholarship', function () {
                return view('pages.scholarship');
            })->name('ourpillar.scholarship');
        });


        Route::group(['prefix' => '/partners'], function () {
            Route::get('/', function () {
                return view('pages.partners');
            })->name('partners');

            Route::get('/government-sector', function () {
                return view('pages.government-sector');
            })->name('partners.government-sector');

            Route::get('/private-sector', function () {
                return view('pages.private-sector');
            })->name('partners.private-sector');
            Route::get('/how-to-involve', function () {
                return view('pages.how-to-involve');
            })->name('partners.how-to-involve');
        });

        Route::group(['prefix' => '/media'], function () {
            Route::get("/", function () {
                return view("pages.media");
            })->name("media");

            Route::get('/news', function () {
                return view('pages.latest-news');
            })->name('media.news');

            Route::get('/annual-reports', function () {
                return view('pages.annual-reports');
            })->name('media.annual-reports');
        });

        Route::get('/career', function () {
            return view('pages.career');
        })->name('career');

        Route::get('/contact-us', function () {
            return view('pages.contact-us');
        })->name('contact-us');
    });
});




