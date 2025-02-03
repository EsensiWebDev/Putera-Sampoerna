<?php

use App\Models\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function ($locale) {
    $previousUrl = url()->previous();
    $availableLocales = config('app.available_locales');
    $pattern = '/\\b('.implode('|', $availableLocales).')\\b/';
    $newUrl = preg_replace($pattern, $locale, $previousUrl);
    return redirect($newUrl);
})->where('locale', implode('|', config('app.available_locales')));

Route::get('/', function () {
    return redirect('/en');
});

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

        Route::get("/news/{slug}", \App\Livewire\DetailNews::class)->name("read-news");

        Route::get("/{slug}", function ($locale, $slug) {
            $page = Page::where("slug", $slug)->firstOrFail();

            $content = match ($locale) {
                "id" => $page->content_id,
                default => $page->content_en
            };

            $decodedContent = json_decode($content, true);

            $renderedHtml = Blade::render($decodedContent['html']);

            $decodedContent['html'] = $renderedHtml;


            return view("page", [
                "page" => $page,
                "content" => $decodedContent,
            ]);
        })->name("dynamic-page");
    });
});

Route::post("/contact", [\App\Http\Controllers\ContactController::class, "store"]);
Route::get("/adm/optimize", function () {
    \Illuminate\Support\Facades\Artisan::call("migrate");
    \Illuminate\Support\Facades\Artisan::call("optimize:clear");
    \Illuminate\Support\Facades\Artisan::call("optimize");
});
