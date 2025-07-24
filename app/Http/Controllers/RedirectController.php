<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Blade;

class RedirectController extends Controller
{
  public function redirect_english($slug, Request $request): Response|RedirectResponse
  {

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
    ];

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

    $requested_path = rtrim($request->getRequestUri(), '/');

    if ($requested_path === '') {
      $requested_path = '/';
    }

    // ✅ Prevent infinite loop: Check if already on the correct destination
    if (array_key_exists($requested_path, $page_redirect)) {
      $destination = $page_redirect[$requested_path];

      if ($requested_path !== $destination) {
        return redirect($destination, 301);
      }
    }

    // ✅ Prevent infinite loop: Check if article is already in the correct URL
    if (in_array($slug, $articles_list_eng)) {
      $destination = "/en/media/news/" . $slug;

      if ($requested_path !== $destination) {
        return redirect($destination, 301);
      }
    }

    if ($requested_path === '/' || $requested_path === '/en') {
      return response()->view('homepage'); // Render homepage instead of redirecting
    }

    // Default behavior: Show 404 if no match (prevents looping)
    abort(404);
  }

  public function redirect_to_news($locale, $slug, Request $request): Response|RedirectResponse
  {

    $page_redirect = [
      '/id/anggota-dewan' => '/id/aboutus/board-member',
      '/id/bagaimana-melibatkan' => '/id/partners/how-to-involve',
      '/id/beasiswa' => '/id/ourpillar/scholarship',
      '/id/beranda' => '/id',
      '/id/berita-terbaru' => '/id/media/news',
      '/id/karir' => '/id/career',
      '/id/kontak-kami' => '/id/contact-us',
      '/id/laporan-tahunan' => '/id/media/annual-reports',
      '/id/mitra' => '/id/partners',
      '/id/putera-sampoerna-foundation' => '/id/aboutus',
      '/id/sambutan-dari-manajemen' => '/id/aboutus/board-member',
      '/id/sambutan-dari-pendiri' => '/id/aboutus/board-member',
      '/id/sampoerna-schools-system' => '/id/ourpillar/sampoerna-school-system',
      '/id/school-development-outreach' => '/id/ourpillar/school-development-outreach',
      '/id/sejarah' => '/id/aboutus/our-journey',
      '/id/sektor-pemerintah' => '/id/partners/government-sector',
      '/id/sektor-swasta' => '/id/partners/private-sector',
      '/id/tentang-kami' => '/id/aboutus',
      '/id/transformasi-putera-sampoerna-foundation' => '/id/aboutus/our-journey',
      '/id/visi-dan-misi' => '/id/aboutus',
    ];

    $articles_list_indo = [
      '4-fungsi-laten-lembaga-pendidikan-di-indonesia',
      '450-guru-dan-110-pelajar-di-samarinda-mendapat-pemerataan-akses-pendidikan-melalui-kemitraan-program-putera-sampoerna-foundation-school-development-outreach',
      '450-guru-paud-hingga-smp-berpartisipasi-dalam-diseminasi-guru-sebagai-program-kolaborasi-pt-sarana-multi-infrastruktur-persero-dengan-psf-sdo',
      '5-tipe-metode-pembelajaran',
      '9-program-literasi-sekolah-yang-bisa-dicoba',
      'apa-itu-sustainable-development-goals-sdgs-dan-poinnya',
      'bapak-pendidikan-indonesia',
      'blended-learning-pengertian-konsep-keuntungannya',
      'budaya-membaca-di-indonesia-tantangan-dan-penyebabnya',
      'environmental-social-and-governance-esg',
      'hadir-di-ubud-writers-readers-festival-2022-sampoerna-academy-inspirasi-pembentukan-kreativitas-pada-anak-melalui-literasi',
      'hari-pendidikan-nasional',
      'kecerdasan-budaya-kompetensi-bahasa-kecakapan-abad-21-wajib-dimiliki-generasi-masa-depan',
      'klarifikasi-menanggapi-artikel-di-kompasiana-tertanggal-18-mei-2014-2',
      'klarifikasi-pemberitaan-psf-di-media-blog-kompasiana',
      'ksb-industrial-visit-memahami-pentingnya-teknologi-bersama-microsoft-indonesia',
      'kurikulum-merdeka-definisi-penerapan-dan-fungsinya',
      'landasan-pendidikan-di-indonesia',
      'lebih-dari-30-000-guru-di-wilayah-3t-kembangkan-potensi-profesi-melalui-school-development-outreach-dari-putera-sampoerna-foundation',
      'masalah-tantangan-pendidikan-yang-dihadapi-indonesia',
      'membangun-smpn-8-singaraja-menjadi-sekolah-berbasis-digital-di-kabupaten-buleleng',
      'mengenal-apa-itu-bioteknologi-dan-dampaknya',
      'mengenal-apa-itu-ekonomi-sirkular-dan-potensinya',
      'mengenal-apa-itu-gmat-dan-gre',
      'mengenal-apa-itu-inovasi-pendidikan-dan-bentuknya',
      'mengenal-beasiswa-untuk-pendidikan-tinggi',
      'mengenal-hilirisasi-definisi-manfaat-dan-dampaknya',
      'mengenal-jenis-jenis-kewirausahaan-di-era-ini',
      'mengenal-ketahanan-pangan-dan-tantangan-yang-dihadapi-indonesia',
      'mengenal-konsep-pendidikan-inklusif',
      'mengenal-konsep-sustainability-definisi-dan-caranya',
      'mengenal-pendidikan-holistik-di-indonesia',
      'mengenal-perbedaan-prinsip-3r-pengolahan-sampah',
      'mengenal-project-based-learning',
      'mengenal-stunting-gejala-penyebab-pencegahan',
      'mengenal-sustainable-agriculture-dan-cara-penerapannya',
      'mengetahui-fungsi-pendidikan-bagi-perkembangan-bangsa',
      'meningkatkan-pemberdayaan-perempuan-di-indonesia',
      'pahlawan-pejuang-pendidikan-di-indonesia',
      'pahlawan-pendidikan-indonesia',
      'pendidikan-informal',
      'pendidikan-karakter',
      'pendidikan-vokasi',
      'pengertian-definisi-intoleransi-dan-contohnya',
      'pengumuman-pemenang-penghargaan-karya-tulis-psf-getaway-2014',
      'pengumuman-waspada-penipuan-rekrutmen',
      'pentingnya-pendidikan-bagi-generasi-bangsa',
      'peran-penting-parenting-di-dunia-pendidikan-anak',
      'potret-pendidikan-sekolah-di-kebun-sawit-sd-perdana-sukamara',
      'program-pengembangan-sekolah-definisi-dan-fungsinya',
      'sampoerna-academy-dorong-generasi-alpha-menghargai-keberagaman-melalui-edukasi-berbasis-steam',
      'semangat-seorang-kepala-sekolah-baru-menjadi-agen-perubahan',
      'standar-pendidikan-nasional',
      'supervisi-pendidikan-fungsi-penerapannya',
      'sustainable-fashion',
      'sustainable-living',
      'sustainable-tourism',
      'tingkat-jenjang-pendidikan-indonesia',
      'tingkatkan-kecintaan-terhadap-laut-sampoerna-academy-bersama-komunitas-parenting-gelar-workshop-save-the-ocean',
      'tingkatkan-kualitas-pendidikan-pt-penjaminan-infrastruktur-indonesia-persero-sasar-5-wilayah-indonesia-dalam-program-beasiswa-guru',
      'tujuan-pendidikan-nasional',
      'zainal-abidin-seorang-guru-yang-mengarungi-sungai-kapuas-demi-mengajar-siswa',
    ];

    // dd($request);
    $requested_path = rtrim($request->getRequestUri(), '/');
    if ($requested_path === '') {
      $requested_path = '/';
    }

    // ✅ Check if the normalized path exists in the redirect map
    if (array_key_exists($requested_path, $page_redirect)) {
      return redirect($page_redirect[$requested_path], 301); // 301 = Permanent Redirect
    }

    if (in_array($slug, $articles_list_indo)) {
      return redirect("/{$locale}/media/news/" . $slug, 301);
    }

    // Otherwise, serve the dynamic page
    $page = Page::where("slug", $slug)->firstOrFail();

    $content = match ($locale) {
      "id" => $page->content_id,
      default => $page->content_en
    };

    $footerPage = Page::where('slug', 'footer')->first();
    $decodedFooter = null;

    if ($footerPage) {
      $footerContentRaw = match ($locale) {
        'en' => $footerPage->content_en,
        'id' => $footerPage->content_id,
        default => $footerPage->content_id,
      };

      $decodedFooter = json_decode($footerContentRaw, true);
      $decodedFooter['html'] = Blade::render($decodedFooter['html']);
    }

    $decodedContent = json_decode($content, true);
    $renderedHtml = Blade::render($decodedContent['html']);
    $decodedContent['html'] = $renderedHtml;

    // dd($decodedFooter);
    return response()->view("page", [
      "page" => $page,
      "content" => $decodedContent,
      "footer" => $decodedFooter
    ]);
  }
}
