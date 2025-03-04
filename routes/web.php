<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RedirectController;
use App\Http\Middleware\SetLocale;
use App\Livewire\DetailNews;
use App\Models\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;


// sitemap
Route::get('/{locale}/sitemap_index.xml', function ($locale) {
    return response()->view('sitemap.locale-index', ['locale' => $locale])
        ->header('Content-Type', 'text/xml');
})->where('locale', 'en|id'); // Restrict to allowed locales

$sitemaps = 'page-sitemap|our-pillar-sitemap|category-sitemap|author-sitemap|post-sitemap';

Route::get("/{locale}/{sitemap}.xml", function ($locale, $sitemap) {
    return response()
        ->view("sitemap.$sitemap", ['locale' => $locale])
        ->header('Content-Type', 'text/xml');
})->where([
    'locale' => 'en|id', // Restrict to allowed locales
    'sitemap' => $sitemaps, // Restrict to allowed sitemap names
]);

$page_redirect = [
    '/' => '/en',
    '/about-us' => '/en/aboutus',
    '/annual-report' => '/en/media/annual-reports',
    '/board-members' => '/en/aboutus/board-member',
    '/career' => '/en/career',
    '/contact-us' => '/en/contact-us',
    '/government-sector' => '/en/partners/government-sector',
    '/how-to-involve' => '/en/partners/how-to-involve',
    '/latest-news' => '/en/media/news',
    '/message-from-the-founder' => '/en/aboutus/board-member',
    '/message-from-the-management' => '/en/aboutus/board-member',
    '/our-journey' => '/en/aboutus/our-journey',
    '/private-sector' => '/en/partners/private-sector',
    '/putera-sampoerna-foundation-2' => '/en/aboutus',
    '/sampoerna-schools-system-2' => '/en/ourpillar/sampoerna-school-system',
    '/scholarship' => '/en/ourpillar/scholarship',
    '/school-development-outreach-2' => '/en/ourpillar/school-development-outreach',
    '/vision-mission' => '/en/aboutus',
    '/0' => '/en',

    '/news/ksb-industrial-visit-memahami-pentingnya-teknologi-bersama-microsoft-indonesia' => '/id/media/news/ksb-industrial-visit-memahami-pentingnya-teknologi-bersama-microsoft-indonesia',
    '/en/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014-2' => '/id/media/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014-2',
    '/id/news/pengumuman-pemenang-penghargaan-karya-tulis-psf-getaway-2014' => '/id/media/news/pengumuman-pemenang-penghargaan-karya-tulis-psf-getaway-2014',
    '/id/news/pengumuman-waspada-penipuan-rekrutmen' => '/id/media/news/pengumuman-waspada-penipuan-rekrutmen',
    '/id/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014' => '/en/media/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014',
    '/en/school-development-outreach-2' => '/en/ourpillar/school-development-outreach',
    '/id/news/pengumuman-waspada-penipuan-rekrutmen' => '/id/media/news/pengumuman-waspada-penipuan-rekrutmen',
    '/id/news/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana' => '/en/media/news/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana',
    '/id/news/pengumuman-pemenang-penghargaan-karya-tulis-psf-getaway-2014' => '/id/media/news/pengumuman-pemenang-penghargaan-karya-tulis-psf-getaway-2014',
    '/id/news/aboutus.html' => '/id',
    '/en/news/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana' => '/en/media/news/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana',
    '/en/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014' => '/en/media/news/klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014',
    '/index.php/en/partners' => '/en/partners',
    '/media/news/peran-penting-parenting-di-dunia-pendidikan-anak' => '/id/media/news/peran-penting-parenting-di-dunia-pendidikan-anak',
    '/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana' => '/en/media/news/klarifikasi-pemberitaan-psf-di-media-blog-kompasiana',
    '/sampoerna-university-industrial-engineering-students-shine-at-icasm-2023' => '/en/media/news/sampoerna-university-industrial-engineering-students-shine-at-icasm-2023',
    '/blue-ocean-strategy-fellowship-public-lecture-with-ridwan-kamil-village-development-an-important-key-to-national-economic-growth' => '/en/media/news/blue-ocean-strategy-fellowship-public-lecture-with-ridwan-kamil-village-development-an-important-key-to-national-economic-growth',
    '/high-quality-education-system' => '/en/media/news/high-quality-education-system',
    '/sa-is-ready-to-open-its-second-school-in-surabaya-in-2022' => '/en/media/news/sa-is-ready-to-open-its-second-school-in-surabaya-in-2022',
    '/the-journey-of-smpn-8-singaraja-to-become-a-digital-based-school-in-kabupaten-buleleng' => '/en/media/news/the-journey-of-smpn-8-singaraja-to-become-a-digital-based-school-in-kabupaten-buleleng',
    '/sampoerna-academy-students-teachers-launch-self-written-e-book' => '/en/media/news/sampoerna-academy-students-teachers-launch-self-written-e-book',
    '/pengumuman-waspada-penipuan-rekrutmen-2' => '/en/media/news/pengumuman-waspada-penipuan-rekrutmen-2',
    '/initiating-international-collaboration-sampoerna-university-and-mapua-university-partner-for-engineering-education-and-research' => '/en/media/news/initiating-international-collaboration-sampoerna-university-and-mapua-university-partner-for-engineering-education-and-research',
    '/sampoerna-university-participates-in-the-2nd-international-symposium-on-optimization-and-ergonomics' => '/en/media/news/sampoerna-university-participates-in-the-2nd-international-symposium-on-optimization-and-ergonomics',
    '/industrial-engineering-study-program-sampoerna-university-industrial-advisory-board-iab-induction-and-meeting-a-collaboration-between-industrial-engineering-academia-and-industry-practitioners' => '/en/media/news/industrial-engineering-study-program-sampoerna-university-industrial-advisory-board-iab-induction-and-meeting-a-collaboration-between-industrial-engineering-academia-and-industry-practitioners',
    '/a-portrait-of-education-in-an-oil-palm-plantation-sd-perdana-sukamara' => '/en/media/news/a-portrait-of-education-in-an-oil-palm-plantation-sd-perdana-sukamara',
    '/zainal-abidin-the-teacher-who-sails-the-kapuas-river-to-teach-his-students' => '/en/media/news/zainal-abidin-the-teacher-who-sails-the-kapuas-river-to-teach-his-students',
    '/sa-held-healing-earth-through-arts-hearts-workshop' => '/en/media/news/sa-held-healing-earth-through-arts-hearts-workshop',
    '/to-improve-the-quality-of-education-pt-penjaminan-infrastruktur-indonesia-persero-targets-5-indonesian-regions-for-its-teacher-scholarship-program' => '/en/media/news/to-improve-the-quality-of-education-pt-penjaminan-infrastruktur-indonesia-persero-targets-5-indonesian-regions-for-its-teacher-scholarship-program',
    '/management-clarification' => '/en',
    '/media/news/sa-held-healing-earth-through-arts-hearts-workshop' => '/en/media/news/sa-held-healing-earth-through-arts-hearts-workshop',
    '/a-new-principals-determination-to-become-an-agent-of-change' => '/en/media/news/a-new-principals-determination-to-become-an-agent-of-change',

];

// Loop through each redirect and define a route
foreach ($page_redirect as $old => $new) {
    Route::get($old, function () use ($new) {
        // session()->put('locale', "id");
        return redirect($new, 301);
    });
}

Route::get('/language/{locale}', function ($locale, Request $request) {
    $previousUrl = url()->previous();
    $availableLocales = config('app.available_locales');

    // Ensure locale is valid
    if (!in_array($locale, $availableLocales)) {
        abort(404);
    }

    // Extract the current locale from the URL
    $pattern = '/\\b(' . implode('|', $availableLocales) . ')\\b/';
    $newUrl = preg_replace($pattern, $locale, $previousUrl);

    // Try to get the article slug from the URL
    preg_match('/news\/([^\/]+)/', $previousUrl, $matches);
    if (!empty($matches[1])) {
        $currentSlug = $matches[1];

        // Find the article based on the current slug
        $article = Article::where('slug', $currentSlug)
            ->orWhere('slug_ind', $currentSlug)
            ->first();

        if ($article) {
            if (
                ($locale === 'id' && (empty($article->content_indonesia) || empty($article->title_indonesia) || empty($article->slug_ind))) ||
                ($locale === 'en' && (empty($article->content_english) || empty($article->title_english) || $article->slug == '-'))
            ) {
                return redirect($locale == 'id' ?  'id/media/news' : 'en/media/news');
            }
            // Determine the correct slug based on the new locale
            $newSlug = $locale === 'id' ? ($article->slug_ind ?? $article->slug) : $article->slug;

            // Replace the slug in the URL
            $newUrl = preg_replace('/news\/([^\/]+)/', "news/{$newSlug}", $newUrl);
        }
    }


    return redirect($newUrl);
})->where('locale', implode('|', config('app.available_locales')));

Route::get('/', function () {
    return redirect('/en');
});

// Route::get('/{slug}', [RedirectController::class, 'redirect_to_news'])
//     ->where('slug', '.*')
//     ->name('dynamic-page');

Route::middleware([SetLocale::class])->group(function () {
    Route::group(['prefix' => '{locale}'], function () {


        Route::get('/', function ($locale) {
            $page = Page::where('slug', '/')->firstOrFail();

            $content = match ($locale) {
                'id' => $page->content_id,
                default => $page->content_en
            };

            $decodedContent = json_decode($content, true);
            $renderedHtml = Blade::render($decodedContent['html']);
            $decodedContent['html'] = $renderedHtml;

            return response()->view('page', [
                'page' => $page,
                'content' => $decodedContent,
            ]);
        })->name('home');

        //        Route::group(["prefix" => "/aboutus"], function () {
        //            Route::get('/', function () {
        //                return view('pages.aboutus');
        //            })->name('aboutus');
        //
        //            Route::get("/our-journey", function () {
        //                return view("pages.ourjourney");
        //            })->name("aboutus.ourjourney");
        //
        //            Route::get("/board-member", function () {
        //                return view("pages.boardmember");
        //            })->name("aboutus.boardmember");
        //        });

        //        Route::group(["prefix" => "/ourpillar"], function () {
        //            Route::get("/", function () {
        //                return view("pages.ourpillar");
        //            })->name("ourpillar");
        //            Route::get("/sampoerna-school-system", function () {
        //                return view("pages.sampoerna-school-system");
        //            })->name("ourpillar.sampoerna-school-system");
        //            Route::get('/school-development-outreach', function () {
        //                return view('pages.school-development');
        //            })->name('ourpillar.school-development');
        //            Route::get('/scholarship', function () {
        //                return view('pages.scholarship');
        //            })->name('ourpillar.scholarship');
        //        });

        //        Route::group(['prefix' => '/partners'], function () {
        //            Route::get('/', function () {
        //                return view('pages.partners');
        //            })->name('partners');
        //
        //            Route::get('/government-sector', function () {
        //                return view('pages.government-sector');
        //            })->name('partners.government-sector');
        //
        //            Route::get('/private-sector', function () {
        //                return view('pages.private-sector');
        //            })->name('partners.private-sector');
        //            Route::get('/how-to-involve', function () {
        //                return view('pages.how-to-involve');
        //            })->name('partners.how-to-involve');
        //        });

        Route::group(['prefix' => '/media'], function () {
            Route::get('/', function () {
                return view('pages.media');
            })->name('media');

            Route::get('/news', function () {
                return view('pages.latest-news');
            })->name('media.news');

            //            Route::get('/annual-reports', function () {
            //                return view('pages.annual-reports');
            //            })->name('media.annual-reports');
        });

        //        Route::get('/career', function () {
        //            return view('pages.career');
        //        })->name('career');

        Route::get('/contact-us', function () {
            return view('pages.contact-us');
        })->name('contact-us');

        Route::get('/media/news/{slug}', DetailNews::class)->name('read-news');

        Route::get('/{slug}', [RedirectController::class, 'redirect_to_news'])
            ->where('slug', '.*')
            ->name('dynamic-page');
    });
});

// Route::get('/{slug}', [\App\Http\Controllers\RedirectController::class, 'redirect_to_news'])->where('slug', '.*');

// Route::get('id/{slug}', [\App\Http\Controllers\RedirectController::class, 'redirect_url_post_id']);

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/adm/optimize', function () {
    Artisan::call('migrate');
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
});


//redirect

