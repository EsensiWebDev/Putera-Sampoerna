<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

class RedirectEnglishController extends Controller
{
    public function redirect($slug): Response|RedirectResponse
    {
        $articles_list_eng = [
            'industrial-engineering-study-program-sampoerna-university-industrial-advisory-board-iab-induction-and-meeting-a-collaboration-between-industrial-engineering-academia-and-industry-practitioners',
            'initiating-international-collaboration-sampoerna-university-and-mapua-university-partner-for-engineering-education-and-research',
            'klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014',
            'klarifikasi-pemberitaan-psf-di-media-blog-kompasiana',
            'pengumuman-waspada-penipuan-rekrutmen-2',
            'sa-held-healing-earth-through-arts-hearts-workshop',
            'sa-is-ready-to-open-its-second-school-in-surabaya-in-2022',
            'sa-surabaya-received-a-grade-a-from-the-national-library',
            'sampoerna-academy-students-teachers-launch-self-written-e-book',
            'sampoerna-university-industrial-engineering-students-shine-at-icasm-2023',
            'sampoerna-university-participates-in-the-2nd-international-symposium-on-optimization-and-ergonomics',
            'the-journey-of-smpn-8-singaraja-to-become-a-digital-based-school-in-kabupaten-buleleng',
            'to-improve-the-quality-of-education-pt-penjaminan-infrastruktur-indonesia-persero-targets-5-indonesian-regions-for-its-teacher-scholarship-program',
            'writing-award-winners-announcement-psf-getaway-2014',
            'zainal-abidin-the-teacher-who-sails-the-kapuas-river-to-teach-his-students',
            'a-new-principals-determination-to-become-an-agent-of-change',
            'a-portrait-of-education-in-an-oil-palm-plantation-sd-perdana-sukamara',
            'blue-ocean-strategy-fellowship-public-lecture-with-ridwan-kamil-village-development-an-important-key-to-national-economic-growth',
            'high-quality-education-system',
        ];

        if (in_array($slug, $articles_list_eng)) {
            return redirect("/en/media/news/" . $slug);
        }

        dd($slug);
        $page = Page::where("slug", $slug)->firstOrFail();

        $content = match ('en') {
            default => $page->content_en
        };

        $decodedContent = json_decode($content, true);
        $renderedHtml = Blade::render($decodedContent['html']);
        $decodedContent['html'] = $renderedHtml;

        return response()->view("page", [
            "page" => $page,
            "content" => $decodedContent,
        ]);
    }
}
