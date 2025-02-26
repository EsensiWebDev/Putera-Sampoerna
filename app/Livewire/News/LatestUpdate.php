<?php

namespace App\Livewire\News;

use App\Models\Article;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class LatestUpdate extends Component
{

    public function placeholder()
    {
        return <<<'HTML'
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        HTML;
    }

    public function render()
    {

        $locale = app()->getLocale();

        // Fetch articles based on the current locale
        $articles = Article::where(function ($query) use ($locale) {
            if ($locale == 'id') {
                // For 'id' locale, ensure content_indonesia and title_indonesia are not empty
                $query->whereNotNull('content_indonesia')
                    ->whereNotNull('title_indonesia')
                    ->whereNotNull('slug_ind')
                    ->where('content_indonesia', '!=', '')
                    ->where('title_indonesia', '!=', '')
                    ->where('isPublished', '1');
            } else {
                // For 'en' locale, ensure content and title_english are not empty
                $query->whereNotNull('content_english')
                    ->whereNotNull('title_english')
                    ->whereNotNull('slug')
                    ->where('content_english', '!=', '')
                    ->where('title_english', '!=', '')
                    ->where('isPublished', '1');
            }
        })
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        return view('livewire.news.latest-update', [
            'articles' => $articles
        ]);
    }
}
